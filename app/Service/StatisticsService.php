<?php


namespace App\Service;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StatisticsService
{

    /**
     * @return Collection
     */
    public function getStatisticsPurchaseOnView(): Collection
    {
        return DB::table('products')
            ->leftJoin('report', 'products.id', '=', 'report.product_id')
            ->leftJoin('report_views', 'products.id', '=', 'report_views.product_id')
            ->select('products.id',
                DB::raw('IF (SUM(report_views.total_views) = 0,"Nan", SUM(report.purchased)/SUM(report_views.total_views)*100) AS percent')
            )
            ->groupBy('products.id')
            ->get();
    }

    /**
     * @param string $date
     * @return Collection
     */
    public function getStatisticsByDate(string $date): Collection
    {
        return DB::table('products')
            ->leftJoin('report', 'products.id', '=', 'report.product_id')
            ->leftJoin('report_views', 'products.id', '=', 'report_views.product_id')
            ->whereRaw('SUBSTRING(report.updated_at, 1, 10) = ?', $date)
            ->whereRaw('SUBSTRING(report_views.updated_at, 1, 10) = ?', $date)
            ->select('products.id', 'products.title',
                DB::raw('SUM(report.purchased*report.ammount) AS amount_of_purchases'),
                DB::raw('SUM(report_views.total_views) as total_views')
            )
            ->groupBy('products.id')
            ->get();
    }
}
