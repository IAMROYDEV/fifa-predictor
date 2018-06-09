<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matchStage extends Model
{
    protected $guarded =[] ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    

}
