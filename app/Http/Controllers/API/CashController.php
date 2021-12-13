<?php

namespace App\Http\Controllers\API;

use App\Models\Kas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $cash = Kas::select(
            'kas.*',
            DB::raw('
                IFNULL(SUM(transaksi.pemasukan), 0) AS total_pemasukan, 
                IFNULL(SUM(transaksi.pengeluaran), 0) AS total_pengeluaran, 
                IFNULL(SUM(transaksi.keuntungan), 0) AS total_keuntungan
            ')
        )
            ->where('kas.id_user', Auth::user()->id)
            ->from('transaksi')
            ->rightJoin('kas', 'kas.id', '=', 'transaksi.id_kas')
            ->groupBy('kas.id')
            ->latest()
            ->paginate(30);

        return ResponseFormatter::success(
            $cash,
            'Data list kas berhasil diambil'
        );
    }

    /**
     * Display latest cash.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $cash = Kas::select(
            'kas.*',
            DB::raw('
                IFNULL(SUM(transaksi.pemasukan), 0) AS total_pemasukan, 
                IFNULL(SUM(transaksi.pengeluaran), 0) AS total_pengeluaran, 
                IFNULL(SUM(transaksi.keuntungan), 0) AS total_keuntungan
            ')
        )
            ->where('kas.id_user', Auth::user()->id)
            ->from('transaksi')
            ->rightJoin('kas', 'kas.id', '=', 'transaksi.id_kas')
            ->groupBy('kas.id')
            ->latest()
            ->take(5)
            ->get();

        return ResponseFormatter::success(
            $cash,
            'Data list kas berhasil diambil'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cash = Kas::select(
            'kas.*',
            DB::raw('
                IFNULL(SUM(transaksi.pemasukan), 0) AS total_pemasukan, 
                IFNULL(SUM(transaksi.pengeluaran), 0) AS total_pengeluaran, 
                IFNULL(SUM(transaksi.keuntungan), 0) AS total_keuntungan
            ')
        )
            ->where('kas.id', $id)
            ->from('transaksi')
            ->rightJoin('kas', 'kas.id', '=', 'transaksi.id_kas')
            ->groupBy('kas.id')
            ->get();

        return ResponseFormatter::success(
            $cash,
            'Data kas berhasil diambil'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['nama']);
        $params['id_user'] = Auth::user()->id;

        $cash = Kas::create($params);

        return ResponseFormatter::success(
            $cash,
            'Kas baru telah ditambahkan'
        );
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
        $params = $request->all();
        $params['slug'] = Str::slug($params['nama']);
        $params['id_user'] = Auth::user()->id;

        $cash = Kas::findOrFail($id);

        $cash->update($params);

        return ResponseFormatter::success(
            $cash,
            'Kas berhasil diperbarui'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash = Kas::findOrFail($id);

        $cash->delete();

        return ResponseFormatter::success(
            $cash,
            'Kas berhasil dihapus'
        );
    }
}
