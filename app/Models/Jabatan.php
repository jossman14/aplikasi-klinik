<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jabatan';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
