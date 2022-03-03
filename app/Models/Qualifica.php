<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifica extends Model
{
    use HasFactory;

    protected $table = 'qualifiche';

    protected $fillable = ['nome'];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
