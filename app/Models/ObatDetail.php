<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObatDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'obat_detail';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama" ,"satuan" ,"jenis_obat" ,"min_stock" ,"max_stock", "stock" ,"tgl_beli" ,"expire" ,"batch" ,"penyedia_obat" ,"harga_beli" ,"harga_jual"
    ];
}
