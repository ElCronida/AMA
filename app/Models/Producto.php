<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';

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
        'nombre',
        'precio',
        'descripcion',
        'stock',
        'marca_id',
        'categoria_id'
    ];

    public function marcas(){
        return $this->hasOne(Marca::class, 'id', 'marca_id');
    }

    public function categorias(){
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }
}
