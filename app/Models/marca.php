<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    use HasFactory;
    protected $table= 'marcas';
    public $timestamps= false;
    protected $fillable = ['marca','estado'];
}




