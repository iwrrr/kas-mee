<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentMenu'] = 'user';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::orderBy('id', 'ASC')->paginate(10);

        return view('pages.user.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('pages.user.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $params = $request->validated();
        $user = User::findOrFail($id);

        return DB::transaction(function () use ($params, $user) {
            if (!$params['password']) {
                unset($params['password']);
            } else {
                $params['password'] = Hash::make($params['password']);
                $user->update($params);
            }

            return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' berhasil diperbarui');
        });

        return redirect()->route('user.index')->with('error', 'User ' . $user->name . ' gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->roles == 'ADMIN') {
            return redirect()->route('user.index')->with('error', 'Tidak dapat menghapus user dengan peran Admin!');
        }

        if ($user->name == Auth::user()->name) {
            return redirect()->route('user.index')->with('error', 'Tidak dapat menghapus user yang sedang login!');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' berhasil dihapus');
    }
}
