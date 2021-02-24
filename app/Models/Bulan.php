<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'bulan';
    use HasFactory;
}
