<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class ProblemReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $problems = Problem::all();
        $statuses = ProblemStatus::all();
        return view('problemreports.index',['problems'=> $problems],['statuses'=> $statuses]);
    }
}
