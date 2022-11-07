<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Problem;
use App\Models\ProblemStatus;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $statuses = ProblemStatus::all();
        $problems = Problem::get();
        return view('problemreports.index', ['orders' => $orders,'problems' => $problems,'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('problems.create', ['orders'=> $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $problem = new Problem();
        $problem->problem_description = $request->input('problem_description');
        $problem->order_id = $request->input('order_id');
        $problem->problem_status_id = ProblemStatus::where('problem_status_process', 'ได้รับแจ้งปัญหา')->first()->id;
        $problem->save();

        $order = Order::findOrFail($problem->order_id);
        return redirect()->route('orders.show', ['order' => $order])->with('status', 'Problem Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateStatus(Request $request, $id){
        $problem = Problem::find($id);
        if($request->input('status')) {
            $problem->problem_status_id = $request->input('status');
            $problem->save();
        }
        return redirect()->route('problems.index', ['problem' => $problem->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
