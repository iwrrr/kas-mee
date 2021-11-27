<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentMenu'] = 'transaksi';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['transaksis'] = Transaksi::orderBy('id', 'ASC')->paginate(10);

        return view('pages.transaksi.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['transaksi'] = Transaksi::findOrFail($id);

        return view('pages.transaksi.show', $this->data);
    }
}
