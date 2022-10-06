<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Transaction;
use App\User;
use Illuminate\Foundation\Console\Presets\React;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('isLoggedIn')) {
            $user = User::all();
            return view('Home', compact('user'));
        } else {
            return view('user.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('')->with('status', 'Data berhasil di print!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kuota_express = Transaction::where('jenis', 'Express')->count();
        $kouta_regular_express = Transaction::where('jenis', 'Regular')->orwhere('jenis', 'Ekonomis')->count();
        if ($request->jenis == 'Express' && $kuota_express >= 5) {
            return redirect()->back()->with('warning', 'Laundry jenis Express sudah penuh');
        } else if ($kouta_regular_express >= 10) {
            return redirect()->back()->with('warning', 'Laundry jenis Regular dan Ekonomi sudah penuh');
        } else {
            $transaction = new Transaction(array(
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'pembayaran' => $request->bayar
            ));
            $transaction->save();
            return redirect()->route('ReceiptAll');
        }
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
        $transaction = Transaction::where('id', $id)->first();
        return view('home', compact('transaction'));
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
        //dd($request);
        $transaction = Transaction::where('id', $id)->first();
        $transaction->nama = $request->nama;
        $transaction->jenis = $request->jenis;
        $transaction->berat = $request->berat;
        $transaction->harga = $request->harga;
        $transaction->pembayaran = $request->bayar;
        $transaction->update();
        return redirect()->route('Home')->with('status', 'Data berhasil diupdate');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id', $id)->delete();
        return redirect()->back();
    }

    public function receiptAll()
    {
        $transaction = Transaction::all();
        return view('receiptall', compact('transaction'));
    }

    public function receipt($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return view('receipt', compact('transaction'));
    }

    public function login(Request $request)
    {
        // dd($request);
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back();
        } else {
            $user = User::where('username', $request->username)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $request->session()->put('username', $request->username);
                $request->session()->put('nama', $user->nama);
                $request->session()->put('isLoggedIn', 'Ya');
                return redirect()->route('Home');
            } else {
                return redirect()->back();
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('Home');
    }
}
