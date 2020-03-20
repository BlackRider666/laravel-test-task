<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticsRequest;
use App\Service\StatisticsService;
use Illuminate\Http\Response;

class StatisticsController extends Controller
{
    /**
     * @var StatisticsService
     */
    private $statisticsService;

    /**
     * StatisticsController constructor.
     * @param StatisticsService $statisticsService
     */
    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    /**
     * @return Response
     */
    public function statisticsPurchaseOnView(): Response
    {
        return response($this->statisticsService->getStatisticsPurchaseOnView(),200);
    }

    /**
     * @param StatisticsRequest $request
     * @return Response
     */
    public function statisticsByDate(StatisticsRequest $request): Response
    {
        return response($this->statisticsService->getStatisticsByDate($request->get('date')),200);
    }
}
