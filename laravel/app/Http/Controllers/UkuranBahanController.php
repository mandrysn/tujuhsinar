<?php

namespace App\Http\Controllers;

use App\Models\UkuranBahan;
use Illuminate\Http\Request;

class UkuranBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UkuranBahan::all();
        return view('master.ukuran-bahan.index', compact('data'));
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
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function show(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function edit(UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UkuranBahan $ukuranBahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UkuranBahan  $ukuranBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UkuranBahan $ukuranBahan)
    {
        //
    }
}
