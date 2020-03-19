<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticsRequest;
use App\Service\StatisticsService;

class StatisticsController extends Controller
{
    /**
     * @var StatisticsService
     */
    private $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function statisticsPurchaseOnView()
    {
        return response($this->statisticsService->getStatisticsPurchaseOnView(),200);
    }
    public function statisticsByDate(StatisticsRequest $request)
    {
        return response($this->statisticsService->getStatisticsByDate($request->get('date')),200);
    }
}
