<?php

namespace App\Http\Controllers;

use App\Service\StatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        $this->validate($request,[
            'date'  =>  'date'
        ]);
        if ($request->get('date') == null)
        {
            $date = Carbon::now()->format('Y-m-d');
        } else {
            $date = $request->get('date');
        }

        return view('statistics',[
            'statistics'    =>  $this->statisticsService->getStatisticsByDate($date),
            'date'          =>  $date,
        ]);
    }
}
