<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $primaryKey = 'id_transaksi';
    protected $guarded = ['id_transaksi'];
    protected $table = 'penjualan';
    use HasFactory;
}
