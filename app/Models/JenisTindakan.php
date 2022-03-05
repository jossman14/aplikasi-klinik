<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisTindakan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenis_tindakan';
    protected $primaryKey  = "id";
    protected $fillable = [
        "nama"
    ];
}
