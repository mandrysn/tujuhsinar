<?php

namespace App\Http\Controllers;

use App\Models\OrderKerja;
use Illuminate\Http\Request;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderKerjaSub::where('status_produksi', '=', 1)->where('status_finishing', '=', 0)->get();
        return view('transaksi.finishing.finishing', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function show(Finishing $finishing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrderKerja::findOrFail($id);
        $data->status_finishing = 2;
        $data->update();

        return redirect()->route('order.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finishing $finishing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finishing $finishing)
    {
        //
    }
}
