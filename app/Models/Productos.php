<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'impuesto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
