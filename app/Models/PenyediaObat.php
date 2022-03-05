<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenyediaObat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'penyedia_obat';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
