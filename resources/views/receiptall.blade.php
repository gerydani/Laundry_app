@extends('layouts.main')
@section('container')
<div class="mt-4">
    <div class="container">
        <div class="card" style="padding: 15px;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Laundry</th>
                        <th scope="col">Berat Laundry</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($transaction as $trans)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$trans->nama}}</td>
                        <td>{{$trans->jenis}}</td>
                        <td>{{$trans->berat}}</td>
                        <td>{{$trans->harga}}</td>
                        <td>{{$trans->pembayaran}}</td>
                        <td>
                            <a href="{{route('Receipt', ['id'=>$trans->id])}}" class="btn badge btn-custom btn-rounded waves-effect waves-light w-md m-b-5 btn-primary">Print</a>
                            <br>
                            <form action="{{route('DeleteReceipt', ['id'=>$trans->id])}}" method="post">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button class="btn badge btn-custom btn-rounded waves-effect waves-light w-md m-b-5 btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection