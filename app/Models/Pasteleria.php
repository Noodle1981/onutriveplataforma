<?php

namespace App\Models; // <-- PRIMERA LÍNEA DE CÓDIGO

// app/Models/Pasteleria.php <-- El comentario ahora está aquí, y es correcto.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasteleria extends Model
{
    use HasFactory;

    protected $table = 'pasteleria';

    protected $fillable = [
        'name',
        'image_path',
        'description',
    ];
}