<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SatuanObat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'satuan_obat';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
