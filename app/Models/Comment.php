<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_comment';
    protected $guarded = ['id_comment'];
    protected $table = 'comment';
    use HasFactory;
}
