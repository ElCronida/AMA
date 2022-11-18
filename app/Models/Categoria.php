<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'categorias';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'nombre'
    ];

    public function productos(){
        return $this->hasMany(Producto::class, 'id','categoria_id');
    }
}
