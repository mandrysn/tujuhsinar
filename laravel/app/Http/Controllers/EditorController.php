<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Member;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Editor::all();
        $member = Member::all();
        return view('master.tools.finishing.finishing', compact('data', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.tools.finishing.finishing_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Editor();
        $data->member_id = $request->member_id;
        $data->nama_finishing = $request->nama_finishing;
        $data->produk_id = $request->produk_id;
        $data->type = $request->type;
        $data->tambahan_harga = $request->tambahan_harga;
        $data->save();

        return redirect()->route('editor.index')->with('alert-success', 'Data Berhasil Ditambah');
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
        $data = Editor::findorfail($id);
        return view('master.tools.finishing.finishing_edit', compact('data'));
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
        $data = Editor::findorfail($id);
        $data->nama_finishing = $request->nama_finishing;
        $data->member_id = $request->member_id;
        $data->produk_id = $request->produk_id;
        $data->tambahan_harga = $request->tambahan_harga;
        $data->type = $request->type;
        $data->update();

        return redirect()->route('editor.index')->with('alert-success', 'Data Berhasil Diedit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Editor::findorfail($id);
        $data->delete();
        
        return redirect()->route('editor.index')->with('alert-success', 'Data Berhasil Dihapus !');
    }
}