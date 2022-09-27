<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = "transaction";
    protected $fillable = ['id', 'nama', 'jenis', 'berat', 'harga', 'pembayaran'];
}
