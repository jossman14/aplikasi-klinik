<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sapaan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sapaan';
    protected $primaryKey  = "id";
    protected $fillable = [
        "sapaan"
    ];
}
