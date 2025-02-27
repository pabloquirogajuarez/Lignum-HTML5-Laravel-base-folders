<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    public function actorPrincipal()
    {
        return $this->belongsTo(Actor::class, 'actor_principal_id');
    }
}