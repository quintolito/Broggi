<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    //
    use Notifiable;

    protected $table = 'usuaris';

    public $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;

    public function rol()
    {
        return $this->belongsTo('App\roles', 'rol_id');
    }
}
