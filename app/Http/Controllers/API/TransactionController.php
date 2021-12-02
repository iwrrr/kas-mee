<?php

namespace App\Http\Controllers\API;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $transaction = Transaksi::where('id_user', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(20);

        return ResponseFormatter::success(
            $transaction,
            'Data list transaksi berhasil diambil'
        );
    }

    /**
     * Display latest transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest(Request $request)
    {
        $transaction = Transaksi::where('id_user', Auth::user()->id)->latest()->take(5)->get();

        return ResponseFormatter::success(
            $transaction,
            'Data list transaksi berhasil diambil'
        );
    }

    /**
     * Display today transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function todayTransaction()
    {
        $transaction = Transaksi::where('id_user', Auth::user()->id)->orderBy('created_at', 'DESC')->first();

        return ResponseFormatter::success(
            $transaction,
            'Data transaksi berhasil diambil'
        );
    }

    /**
     * Display transaction by cash id.
     *
     * @return \Illuminate\Http\Response
     */
    public function transactionsByCash($id)
    {
        $transaction = Transaksi::where('id_kas', $id)->where('id_user', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(20);

        return ResponseFormatter::success(
            $transaction,
            'Data transaksi berhasil diambil'
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

        $transaction = Transaksi::create($params);

        return ResponseFormatter::success(
            $transaction,
            'Transaksi baru telah ditambahkan'
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

        $transaction = Transaksi::findOrFail($id);

        $transaction->update($params);

        return ResponseFormatter::success(
            $transaction,
            'Transaksi berhasil diperbarui'
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
        $transaction = Transaksi::findOrFail($id);

        $transaction->delete();

        return ResponseFormatter::success(
            $transaction,
            'Transaksi berhasil dihapus'
        );
    }
}
