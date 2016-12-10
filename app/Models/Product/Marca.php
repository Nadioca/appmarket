<?php

namespace Market\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $table = 'marcas';
	  protected $primarykey = 'id';
    public $timestamps = false; // esta linea evita utilizar timestamps
	  protected $fillable = ['id','nombre'];

    public function producto(){
      // belongsto --> pertenece a
      return $this -> belongsto(Producto::class);
    }

}
