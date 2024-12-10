<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{

    use HasFactory;
    protected $fillable = ['quantidade_de_lugares','reservada'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
