<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
}
