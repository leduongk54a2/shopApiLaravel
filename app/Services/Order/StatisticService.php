<?php

namespace App\Services\Order;

use App\Models\Order;

class StatisticService extends BaseService
{
    public function execute() {
        $revenueByYearMonth = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as totalRevenue')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $formattedData = [];

        foreach ($revenueByYearMonth as $item) {
            $year = $item->year;
            $month = date('F', mktime(0, 0, 0, $item->month, 1));

            if (!isset($formattedData[$year])) {
                $formattedData[$year] = [
                    'year' => $year,
                    'statistic' => [],
                ];
            }

            $formattedData[$year]['statistic'][$month] = $item->totalRevenue ?? 0;
        }
        foreach ($formattedData as &$data) {
            $data['statistic'] = array_replace(array_fill_keys(
                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                0
            ), $data['statistic']);
        }
        return $formattedData;
    }
}
