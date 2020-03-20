<?php

namespace App\Http\Controllers;

use App\Service\StatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @param Request $request
     * @return View
     * @throws ValidationException
     */
    public function index(Request $request): View
    {
        $this->validate($request, [
            'date'  =>  'date',
        ]);
        if ($request->get('date') === null) {
            $date = Carbon::now()->format('Y-m-d');
        } else {
            $date = $request->get('date');
        }

        return view('statistics', [
            'statistics'    =>  $this->statisticsService->getStatisticsByDate($date),
            'date'          =>  $date,
        ]);
    }
}
