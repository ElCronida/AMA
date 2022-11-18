<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioGimnasio extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios_gimnasios';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
