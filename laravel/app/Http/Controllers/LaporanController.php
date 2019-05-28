<?php

namespace App\Http\Controllers;


use App\Models\OrderKerja;
use App\Models\OrderKerjaSub;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailOrder(Request $request) {
        if (is_null($request->tanggal) || is_null($request->jam)) {
            return view('laporan.order.laporan-order');
        } else {
            $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
           
            $data = OrderKerja::where(\DB::raw("DATE_FORMAT(tanggal,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(tanggal,'%H')"),[$jam[0],$jam[1]])->orderBy('tanggal', 'desc')->get();

            return view('laporan.detail.detail-order', compact('data', 'tanggal','jam'));
        }
    }

    // public function laporanDetailOrder(Request $request) {
    //     if (is_null($request->periode)) {
    //         return view('laporan.order.laporan-order');
    //     } else {
    //         $periode = $request->periode;
    //         $tanggal = explode(' / ', $periode);
    //         $data = OrderKerja::whereBetween('tanggal', [$tanggal[0], $tanggal[1]])->orderBy('tanggal', 'desc')->get();

    //         return view('laporan.detail.detail-order', compact('data', 'periode'));
    //     }
    // }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailIndoor(Request $request) {
        if (is_null($request->tanggal)) {
            return view('laporan.order.laporan-indoor');
        } else {
            $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '1')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
            
            return view('laporan.detail.detail-indoor', compact('data', 'tanggal','jam'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailOutdoor(Request $request) {
        if (is_null($request->tanggal)) {
            return view('laporan.order.laporan-outdoor');
        } else {
            $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '2')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();

            return view('laporan.detail.detail-outdoor', compact('data', 'tanggal','jam'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailMerchandise(Request $request) {
        if (is_null($request->tanggal)) {
            return view('laporan.order.laporan-merchandise');
        } else {
           $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '3')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();

            return view('laporan.detail.detail-merchandise', compact('data', 'tanggal','jam'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailPrint(Request $request) {
        if (is_null($request->tanggal)) {
            return view('laporan.order.laporan-print');
        } else {
            $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '4')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();

            return view('laporan.detail.detail-print', compact('data', 'tanggal','jam'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailCustom(Request $request) {
        if (is_null($request->tanggal)) {
            return view('laporan.order.laporan-custom');
        } else {
            $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '5')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();

            return view('laporan.detail.detail-custom', compact('data', 'tanggal','jam'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanOrder(Request $request) {
        $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
        $jam = explode(' - ', $request->jam);
       
        $data = OrderKerja::where(\DB::raw("DATE_FORMAT(tanggal,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(tanggal,'%H')"),[$jam[0],$jam[1]])->orderBy('tanggal', 'desc')->get();
        return view('laporan.cetak.cetak-order', compact('data','tanggal','jam'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanIndoor(Request $request) {
       $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '1')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-indoor', compact('data','tanggal','jam'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanOutdoor(Request $request) {
        $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '2')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-outdoor', compact('data','tanggal','jam'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanMerchandise(Request $request) {
        $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '3')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-merchandise', compact('data','tanggal','jam'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanPrint(Request $request) {
       $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '4')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-print', compact('data','tanggal','jam'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanCustom(Request $request) {
        $tanggal = date('Y-m-d',strtotime($request->tanggal));
          
            $jam = explode(' - ', $request->jam);
            $data = OrderKerjaSub::where('produk_id', '5')->where(\DB::raw("DATE_FORMAT(deadline,'%Y-%m-%d')"),$tanggal)->whereBetween(\DB::raw("DATE_FORMAT(deadline,'%H')"),[$jam[0],$jam[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-custom', compact('tanggal','jam'));
    }
}
