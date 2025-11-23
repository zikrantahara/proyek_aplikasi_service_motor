<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_service_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan'
    ];

    public function data_service()
    {
        return $this->belongsTo(DataService::class, 'data_service_id');
    }
}
