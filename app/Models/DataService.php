<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    use HasFactory;
    protected $fillable = [
        'daftar_service_id',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti'
    ];
    public function daftar_service()
    {
        return $this->belongsTo(DaftarService::class, 'daftar_service_id');
    }
}
