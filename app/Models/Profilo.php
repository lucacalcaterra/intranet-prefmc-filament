<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilo extends Model
{
    use HasFactory;

    protected $table = 'qualifiche';

    /**
     * Get Utente del profilo.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
