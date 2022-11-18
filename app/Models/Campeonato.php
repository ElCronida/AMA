<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campeonatos';

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
        'fecha_ini',
        'fecha_fin',
        'hora_ini',
        'hora_fin',
        'descripcion',
        'reglamento_id'
    ];

    public function reglamentos(){
        return $this->hasOne(Reglamento::class, 'id', 'reglamento_id');
    }

    public function arbitros(){
        return $this->belongsToMany(Arbitro::class, 'campeonatos_arbitros', 'campeonato_id', 'arbitro_id');
    }
}
