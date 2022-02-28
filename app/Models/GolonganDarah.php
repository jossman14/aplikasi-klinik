<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GolonganDarah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'golongan_darah';
    protected $primaryKey  = "gol_dar_id";
    protected $fillable = [
        "golongan_darah"
    ];
}
