<?php

namespace App\Http\Controllers\api;

use App\Models\Statistics;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StatisticsRequest;
use App\Http\Requests\StatisticFilterRequest;
use App\Http\Resources\StatisticFilterResource;

class StatisticsController extends Controller
{

    public function index(StatisticFilterRequest $request)
    {
        return response()->json([
            'statistics' => StatisticFilterResource::collection(
                Statistics::query()
                    ->where('created_at', '>=', $request->input('from'))
                    ->where('created_at', '<=', $request->input('to'))
                    ->get()
            ),
        ]);
    }

    public function store(StatisticsRequest $request)
    {
        $statistics = Statistics::query()->where('created_at', '=', $request->date('date'))->first();

        if (is_null($statistics)) {
            $statistics = new Statistics();
        }

        $statistics->views += $request->input('views');
        $statistics->cost += $request->input('cost');
        $statistics->clicks += $request->input('clicks');
        $statistics->created_at = $request->input('date');

        $statistics->save();

        return response()->json([
            'id' => $statistics->id,
        ]);
    }

    public function restore()
    {
        if (!Statistics::count()) {
            return response()->json([
                'response' => 'statistics not found, nothing to clear.',
            ]);
        }

            DB::table('statistics')->truncate();

            return response()->json([
                'response' => 'Statistics clear',
            ]);
        }


}
