<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcard extends Model
{
    use HasFactory;
    protected $table = 'postcards';
    protected $fillable = ['caption', 'image', 'category', 'photograph_by', 'status', 'is_available'];
}
