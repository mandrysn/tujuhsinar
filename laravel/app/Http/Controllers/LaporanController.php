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
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-order');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' / ', $periode);
            $data = OrderKerja::whereBetween('tanggal', [$tanggal[0], $tanggal[1]])->orderBy('tanggal', 'desc')->get();

            return view('laporan.detail.detail-order', compact('data', 'periode'));
        }
    }

    public function laporanDetailOrder(Request $request) {
        if (is_null($request->periode)) {
            return view('laporan.order.laporan-order');
        } else {
            $periode = $request->periode;
            $tanggal = explode(' / ', $periode);
            $data = OrderKerja::whereBetween('tanggal', [$tanggal[0], $tanggal[1]])->orderBy('tanggal', 'desc')->get();

            return view('laporan.detail.detail-order', compact('data', 'periode'));
        }
    }

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
            $tanggal = explode(' / ', $periode);
            $data = OrderKerjaSub::where('produk_id', '1')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
            
            return view('laporan.detail.detail-indoor', compact('data', 'periode'));
        }
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
            $tanggal = explode(' / ', $periode);
            $data = OrderKerjaSub::where('produk_id', '2')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();

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
            $tanggal = explode(' / ', $periode);
            $data = OrderKerjaSub::where('produk_id', '3')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();

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
            $tanggal = explode(' / ', $periode);
            $data = OrderKerjaSub::where('produk_id', '4')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();

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
            $tanggal = explode(' / ', $periode);
            $data = OrderKerjaSub::where('produk_id', '5')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();

            return view('laporan.detail.detail-custom', compact('data', 'periode'));
        }
    }

    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanOrder(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerja::whereBetween('tanggal', [$tanggal[0], $tanggal[1]])->orderBy('tanggal', 'desc')->get();
        return view('laporan.cetak.cetak-order', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanIndoor(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '1')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-indoor', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanOutdoor(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '2')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-outdoor', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanMerchandise(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '3')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-merchandise', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanPrint(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '4')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-print', compact('data'));
    }
    /**
     * Print all the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporanCustom(Request $request) {
        $tanggal = explode(' / ', $request->periode);
        $data = OrderKerjaSub::where('produk_id', '5')->whereBetween('deadline', [$tanggal[0], $tanggal[1]])->orderBy('id', 'desc')->get();
        return view('laporan.cetak.cetak-custom', compact('data'));
    }
}
