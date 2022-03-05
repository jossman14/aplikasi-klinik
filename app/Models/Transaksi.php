<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transaksi';
    protected $primaryKey  = "id";
    protected $fillable = [
        "waktu_transaksi",
        "id_riwayat",
        "jumlah_transaksi",
        "id_daftar",
        "jenis_transaksi",

    ];
}
