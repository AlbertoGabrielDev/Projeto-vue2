<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{

    protected $table = 'registro';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = [
        'name',
        'email',
        'phone',
    ];

    protected $hidden = [
        'password',
    ];
    
}
