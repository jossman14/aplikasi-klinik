<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Agama extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'agama';
    protected $primaryKey  = "agamaId";
    protected $fillable = [
        "agama"
    ];
}
