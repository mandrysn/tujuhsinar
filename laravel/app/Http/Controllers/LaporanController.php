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
    //         $tanggal = explode(' - ', $periode);
    //         $data = OrderKerja::whereBetween('tanggal', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('tanggal', 'desc')->get();

    //         return view('laporan.detail.detail-order', compact('data', 'periode'));
    //     }
    // }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailIndoor(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-indoor');
        } else {
            $periode = $request->periode;
           
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::where('produk_id', '1')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            
            return view('laporan.detail.detail-indoor', compact('data', 'periode'));
        }
    }



    public function laporanDetailHari(Request $request)
    {
        $tanggal = $request->tanggal;
        $jam = explode(' - ', $request->jam);
        $jamnya = $request->jam;
        $data = OrderKerjaSub::where(\DB::raw("(DATE_FORMAT(deadline,'%Y-%m-%d'))"), $tanggal)->whereBetween(\DB::raw("(DATE_FORMAT(deadline,'%H'))"), [$jam[0], $jam[1]])->orderBy('deadline', 'desc')->get();
        return view('laporan.detail.detail-hari', compact('data','tanggal','jamnya'));
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailOutdoor(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-outdoor');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::where('produk_id', '2')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-outdoor', compact('data', 'periode'));
        }
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailMerchandise(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-merchandise');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::where('produk_id', '3')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-merchandise', compact('data', 'periode'));
        }
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailPrint(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-print');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::where('produk_id', '4')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-print', compact('data', 'periode'));
        }
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanDetailCustom(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-custom');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::where('produk_id', '5')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-custom', compact('data', 'periode'));
        }
    }



    public function laporanDetailInvoice(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-invoice');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'invoice');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-invoice', compact('data', 'periode'));
        }
    }

    public function laporanDetailDp(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-dp');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'down payment');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-dp', compact('data', 'periode'));
        }
    }

    public function laporanDetailTunai(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-tunai');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' - ', $periode);
            $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'tunai');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
            return view('laporan.detail.detail-tunai', compact('data', 'periode'));
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
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '1')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-indoor', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanOutdoor(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '2')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-outdoor', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanMerchandise(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '3')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-merchandise', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanPrint(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '4')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-print', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanCustom(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '5')->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-custom', compact('data'));
    }


    public function laporanInvoice(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'invoice');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-invoice', compact('data'));
    }

    public function laporanDp(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'down payment');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-dp', compact('data'));
    }

    public function laporanTunai(Request $request) {
        $tanggal = explode(' - ', $request->periode);
        $data = OrderKerjaSub::whereHas('OrderKerja',function ($q)
            {
                $q->where('status_payment', 'tunai');
            })->whereBetween('deadline', [date('Y-m-d',strtotime($tanggal[0])), date('Y-m-d',strtotime($tanggal[1]))])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-tunai', compact('data'));
    }

    public function laporanHari(Request $request)
    {
        $tanggal = $request->tanggal;
        $jam = explode(' - ', $request->jam);
        $jamnya = $request->jam;
        $data = OrderKerjaSub::where(\DB::raw("(DATE_FORMAT(deadline,'%Y-%m-%d'))"), $tanggal)->whereBetween(\DB::raw("(DATE_FORMAT(deadline,'%H'))"), [$jam[0], $jam[1]])->orderBy('deadline', 'desc')->get();
        return view('laporan.cetak.cetak-hari', compact('data'));
    }
}