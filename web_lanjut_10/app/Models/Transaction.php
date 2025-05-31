<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_transaksi',
        'kode_customer',
        'kode_produk',
        'quantity',
        'total_harga',
        'status',
        'tanggal_dibayar',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->kode_transaksi)) {
                $model->kode_transaksi = strtolower(substr(uniqid(), -6));
            }
        });
    }

    protected $casts = [
        'tanggal_dibayar' => 'datetime',
    ];
}
