<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gimnasios';

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
        'direccion',
        'cod_postal',
        'email',
        'telefono'
    ];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class, 'usuarios_gimnasios', 'gimnasio_id','usuario_id');
    }

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'gimnasios_disciplinas', 'gimnasio_id','disciplina_id');
    }

    public function federaciones(){
        return $this->belongsToMany(Federacion::class, 'gimnasios_federaciones', 'gimnasio_id','federacion_id');
    }
}
