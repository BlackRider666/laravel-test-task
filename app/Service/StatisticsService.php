<?php


namespace App\Service;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    public function getStatisticsPurchaseOnView(): Collection
    {
        return DB::table('products')
            ->leftJoin('report','products.id','=','report.product_id')
            ->leftJoin('report_views','products.id','=','report_views.product_id')
            ->select('products.id',
                DB::raw('IF (SUM(report_views.total_views) = 0,"Nan", SUM(report.purchased)/SUM(report_views.total_views)*100) AS percent'))
            ->groupBy('products.id')
            ->get();
    }

    public function getStatisticsByDate(string $date): Collection
    {
        return DB::table('products')
            ->leftJoin('report','products.id','=','report.product_id')
            ->where('report.updated_at','LIKE','%'.$date.'%')
            ->leftJoin('report_views','products.id','=','report_views.product_id')
            ->where('report_views.updated_at','LIKE','%'.$date.'%')
            ->select('products.id', 'products.title',
                DB::raw('SUM(report.purchased*report.ammount) AS amount_of_purchases'),
                DB::raw('SUM(report_views.total_views) as total_views')
            )
            ->groupBy('products.id')
            ->get();
    }
}
