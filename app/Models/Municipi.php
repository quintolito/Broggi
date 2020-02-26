<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipi extends Model
{
    //

    protected $table ='municipis';
    public $primaryKey='id';
    public $incrementing=true;
    public $timestamps=false;


    public function municipi()
    {
        return $this->belongsTo('App\Models\Municipi', 'municipis_id');
    }

}
