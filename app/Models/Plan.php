<?php
// app/Models/Plan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'planes';

    // Campos que se pueden llenar desde un formulario
    protected $fillable = [
        'name',
        'image_path',
    ];
}