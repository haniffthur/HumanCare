<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCatatan extends Model
{
    use HasFactory;
    protected $table = 'catatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'tanggal',
        'waktu',
        'suhu',
        'lokasi',
        'catatan',
    ];
    protected $guarded = [];
}
