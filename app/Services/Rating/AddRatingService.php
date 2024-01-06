<?php

namespace App\Services\Rating;

use App\Models\Rating;
use App\Models\Supplier;

class AddRatingService extends BaseService
{


    public function execute($params)
    {
        $customer = $this->customerRepository->where("user_id", $params["userId"])->first();
        Rating::where('customerId', $customer->customer_id)->where('productId', $params["productId"])
            ->update(['ratingPoint' => $params["ratingPoint"]]);
        sleep(0.01);
        $this->predictRatings();
    }
    public function predictRatings()
    {
        // Bước 1: Lấy dữ liệu từ bảng rating
        $ratings = Rating::all();
        // Bước 2: Chuẩn hóa dữ liệu
        $mean_user_rating = $ratings->groupBy(function ($item) {
            return $item->customerId ?? 'NULL';
        })->map(function ($group) {
            // Lọc ra những ratingPoint có giá trị không phải NULL và tính giá trị trung bình
            $filteredGroup = $group->filter(function ($item) {
                return $item->ratingPoint !== null;
            });

            return $filteredGroup->isEmpty() ? 0 : $filteredGroup->avg('ratingPoint');
        });

        $ratings_demeaned = $ratings->map(function ($rating) use ($mean_user_rating) {
            $demeanedRating = $rating->ratingPoint !== null
                ? $rating->ratingPoint - $mean_user_rating[$rating->customerId]
                : 0;

            return [
                'customerId' => $rating->customerId,
                'productId' => $rating->productId,
                'ratingPoint' => $rating->ratingPoint,
                'demeaned_rating' => $demeanedRating,
            ];
        });

        // Bước 3: Tính toán cosine similarity
        $user_similarity = $this->calculateCosineSimilarity($ratings_demeaned);

        // Bước 4: Dự đoán và cập nhật cột ratingpredict
        foreach ($ratings as $rating) {
            $customerId = $rating->customerId;
            $productId = $rating->productId;
            $k = 2;
            $predicted_rating = $this->predictRating($user_similarity, $ratings_demeaned, $customerId, $productId,$mean_user_rating,$k);

            // Cập nhật cột ratingpredict trong database
            Rating::where('customerId', $customerId)->where('productId', $productId)
                ->update(['ratingPredict' => $predicted_rating]);
        }

    }

    private function calculateCosineSimilarity($data)
    {
        $data_grouped = $data->groupBy(function ($item) {
            return $item["customerId"] ?? 'NULL';
        });

        $similarities = [];

        foreach ($data_grouped as $key => $group) {
            $ratings = $group->pluck('demeaned_rating')->toArray();
            $user_similarity = $this->cosineSimilarity($ratings, $data);

            $similarities[$key] = $user_similarity;
        }

        return $similarities;
    }

    private function cosineSimilarity($vector1, $data)
    {
        $similarities = [];

        foreach ($data as $item) {

            $vector2 = [$item['demeaned_rating']];
            $dot_product = array_sum(array_map(function ($a, $b) {
                return $a * $b;
            }, $vector1, $vector2));

            $magnitude1 = sqrt(array_sum(array_map(function ($a) {
                return $a * $a;
            }, $vector1)));

            $magnitude2 = sqrt(array_sum(array_map(function ($a) {
                return $a * $a;
            }, $vector2)));
            $similarity = ($magnitude1 > 0 && $magnitude2 > 0) ? $dot_product / ($magnitude1 * $magnitude2) : 0;
            $similarities[] = $similarity;
        }

        return $similarities;
    }

    private function predictRating($user_similarity, $ratings_demeaned, $customerId, $productId,$mean_user_rating,$k)
    {
        $similar_users = $user_similarity[$customerId];

        // Sắp xếp và chọn ra k người dùng tương tự
        arsort($similar_users);
        $top_k_users = array_slice($similar_users, 0, $k, true);

        $non_zero_ratings = $ratings_demeaned->whereIn('customerId', array_keys($top_k_users))
            ->where('productId', $productId)
            ->pluck('demeaned_rating')
            ->toArray();



        $weighted_sum = array_sum(array_map(function ($similarity, $rating) {
            return $similarity * $rating;
        }, $similar_users, $non_zero_ratings));

        $sum_of_weights = array_sum(array_map('abs', $similar_users));

        if ($sum_of_weights == 0) {
            return 0;
        } else {
            return $mean_user_rating[$customerId] + ($weighted_sum / $sum_of_weights);
        }
    }
}
