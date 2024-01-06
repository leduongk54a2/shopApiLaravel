<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class GetListOrderService extends BaseService
{
    public function execute()
    {


        $userId = Auth::user()->userID;
        $listOrder = $this->orderRepository->where("userId",$userId)->get()->toArray();
        $result = [];
        foreach ($listOrder as $item) {
            $listOrderDetail = $this->orderDetailRepository->where("orderId", $item["orderId"])->get()->makeHidden("orderId")->toArray();
            $listOrderDetailProduct = [];
            foreach ($listOrderDetail as $orderDetail) {
                $productInfo =$this->productRepository->find($orderDetail["productId"])->makeHidden(["productId","quantity"])->toArray();
                array_push($listOrderDetailProduct,[...$orderDetail,...$productInfo]);

            }
            $resultItem = [
                ...$item,
                'listOrderDetail' => $listOrderDetailProduct
            ];
            array_push($result,$resultItem);
        }
        return $result;
    }
}
