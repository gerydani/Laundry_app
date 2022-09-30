@extends('layouts.main')

@section('container')
<div class="mt-4">
    <div class="container">
        <div class="card" style="padding: 15px;">
            <h4>Data Laundry</h4>
            @isset($transaction)
            <form action="{{route('Update.Transaction',['id'=>$transaction->id])}}" role="form" enctype="multipart/form-data" method="POST">
                {{ method_field('PUT') }}
                @else
                <form action="/transaction" data-parsley-validate novalidate enctype="multipart/form-data" method="POST">
                    @endisset
                    @csrf
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="example: Saipuddin" value="@isset($transaction->nama){{$transaction->nama}}@endisset">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Pilih jenis laundry</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="jenis" name="jenis" aria-label="Default select example" onChange="getTotalHarga()" value="@isset($transaction->jenis){{$transaction->jenis}}@endisset">
                                <option selected disabled>Pilih jenis laundry</option>
                                <option id="jenis-1" value="Express">Express (1 hari, Rp 15.000/kg)</option>
                                <option id="jenis-2" value="Regular">Regular (2-3 hari, Rp 9.000/kg)</option>
                                <option id="jenis-3" value="Ekonomis">Ekonomis (4-5 hari, Rp 7.000/kg)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Berat Laundry</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="berat" name="berat" placeholder="example: 5" onChange="getTotalHarga()" value="@isset($transaction->berat){{$transaction->berat}}@endisset">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" id="harga" name="harga" aria-label="Dollar amount (with dot and two decimal places)" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Pilih metode pembayaran</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="bayar" name="bayar" aria-label="Default select example">
                                <option selected disabled>Pilih metode pembayaran</option>
                                <option value="Cash">Cash</option>
                                <option value="OwO">OwO</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.map"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.map"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    -->

<script>
    function getTotalHarga() {
        var jenis = $('#jenis').val();
        if (jenis == "Express") {
            var biaya = 15000;
            var berat = $('#berat').val();
            var total = biaya * berat;
            $('#harga').val(total);
        } else if (jenis == "Regular") {
            var biaya = 9000;
            var berat = $('#berat').val();
            var total = biaya * berat;
            $('#harga').val(total);
        } else {
            var biaya = 7000;
            var berat = $('#berat').val();
            var total = biaya * berat;
            $('#harga').val(total);
        }
        console.log(jenis, berat, total);
    }
</script>
@endsection