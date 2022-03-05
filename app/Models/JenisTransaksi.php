<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisTransaksi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenis_transaksi';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
