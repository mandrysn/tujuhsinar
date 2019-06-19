<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::all();
        return view('master.member.member', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.member.member_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Member();
        $data->nm_tipe = $request->nm_tipe;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('member.index')->with('alert-success', 'Data Berhasil Ditambah');
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
        $data = Member::where('id', $id)->get();
        return view('master.member.member_edit', compact('data'));
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
        $data = Member::where('id', $id)->first();
        $data->nm_tipe = $request->nm_tipe;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('member.index')->with('alert-success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::where('id', $id)->delete();
        return redirect()->route('member.index')->with('alert-success', 'Data Berhasil Dihapus');
    }

    public function load_data()
    {
        $data = Member::orderBy('created_at', 'desc')->get();
        $index = 0;
        $json = [];
        foreach ($data as $member) {
            $json[] = [$index + 1,$member->nm_tipe,$member->keterangan,'<a href="#" class="btn btn-primary memilih" data-nama="'.$member->nm_tipe.'"  data-id="'.$member->id.'"><i class="fa fa-info memilih"></i>Pilih</a>'];
            
        }
        return ['data'=>$json];
    }
}