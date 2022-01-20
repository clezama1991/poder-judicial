<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compras extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'producto_id',
        'user_id',
        'factura'
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

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }

    public function factura()
    {
        if($this->factura){
            return $this->belongsTo(Facturas::class, 'id' ,'compra_id');
        }else{
            return false;
        }
    }
    
}
