php artisan make:model Productos
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

    //////////////
    php artisan make:model Compras
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


    php artisan make:model Facturas
    //////////////
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

    