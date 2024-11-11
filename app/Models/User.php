<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'contato',
        'password',
        'acesso',
        'foto',
    ];

    // Se houver campos ocultos, como senha
    protected $hidden = [
        'password',
        'remember_token',
    ];

}

