<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusNikah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'status_nikah';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
