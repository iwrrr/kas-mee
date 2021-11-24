<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['currentMenu'] = 'dashboard';
    }

    public function index()
    {
        $this->data['user'] = User::count();
        $this->data['kas'] = Kas::count();
        $this->data['transaksi'] = Transaksi::count();

        return view('pages.home', $this->data);
    }
}
