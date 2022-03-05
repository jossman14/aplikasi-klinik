<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengeluaranBerulang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pengeluaran_berulang';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
