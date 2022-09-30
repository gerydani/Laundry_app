@extends('layouts.main')
@section('container')
<div class="container">
    <div class="card" style="padding: 15px;">
        <h4>Receipt</h4>
        <form action="/back" method="get">
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="" disabled value="@isset($transaction->nama){{$transaction->nama}}@endisset">
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Jenis Laundry</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="" disabled value="@isset($transaction->jenis){{$transaction->jenis}}@endisset">
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Berat Laundry</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="" disabled value="@isset($transaction->berat){{$transaction->berat}}@endisset kg">
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" disabled aria-label="Dollar amount (with dot and two decimal places)" placeholder="" value="@isset($transaction->harga){{$transaction->harga}}@endisset">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="" disabled value="@isset($transaction->pembayaran){{$transaction->pembayaran}}@endisset">
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary">Print</button>
                <!-- <a href="/" class="btn btn-primary" onclick="alert('Struck berhasil di Print!')">Print</a> -->
            </div>
        </form>
    </div>
</div>
</div>
@endsection