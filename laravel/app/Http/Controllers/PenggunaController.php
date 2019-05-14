<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate

        User::create([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'no_telp'   => $request->no_telp,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'role'      => $request->role
        ]);

        return redirect()->route('pengguna.index')->with('alert-user', $request->nama . ' Telah Ditambahkan Sebagai anu');
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
        $user = User::find($id);
        return view('user.user_edit', compact('user'));
        //dd('di edit disini');
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
        $nama = $request->nama;
        if (isset($request->lama)) {
            $user = User::find($id);
            $nama = $user->nama;
            if (Hash::check($request->lama, $user->password )) {
                $user->update([
                    'password' => bcrypt($request->baru),
                    'nama'      => $request->nama,
                    'alamat'    => $request->alamat,
                    'no_telp'   => $request->no_telp,
                    'username'  => $request->username,
                    'role'      => $request->role
                ]);
            }else{
                return redirect()->route('pengguna.index')->with('alert-user', 'Password Lama Salah!!');
            }

        }else{
            User::find($id)->update([
                'nama'      => $request->nama,
                'alamat'    => $request->alamat,
                'no_telp'   => $request->no_telp,
                'username'  => $request->username,
                'role'      => $request->role
            ]);
        }

        return redirect()->route('pengguna.index')->with('alert-user', 'Data ' . $nama . ' Telah Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return redirect()->route('pengguna.index')->with('alert-user', ' Petugas Telah Di Hapus');
    }

    public function ganti($id){
        if (Auth::user()->id != $id) return redirect()->route('pengguna.index');

        $user = User::find($id);
        return view('user.pass', compact('user'));
    }

}
