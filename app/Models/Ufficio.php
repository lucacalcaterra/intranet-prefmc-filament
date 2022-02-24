<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufficio extends Model
{
    use HasFactory;

    protected $table = 'uffici';

    protected $fillable = ['nome'];

}
