<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'arbitros';

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
        'apellido1',
        'apellido2',
        'fec_nac',
        'email',
        'telefono'
    ];

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'arbitros_disciplinas', 'arbitro_id', 'disciplina_id');
    }
}
