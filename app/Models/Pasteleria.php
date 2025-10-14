<?php

namespace App\Models; // <-- PRIMERA LÍNEA DE CÓDIGO

// app/Models/Pasteleria.php <-- El comentario ahora está aquí, y es correcto.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Click;

class Pasteleria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pasteleria';

    protected $fillable = [
        'name',
        'image_path',
        'description',
    ];
    public function clicks()
{
    return $this->morphMany(Click::class, 'clickable');
}
}