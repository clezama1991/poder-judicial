<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facturas extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'compra_id',
        'total_compra',
        'total_impuesto',
        'total_pagar'
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

    public function compra()
    {
        return $this->belongsTo(Compras::class, 'compra_id');
    }

}
