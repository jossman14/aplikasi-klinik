<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisObat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenis_obat';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
