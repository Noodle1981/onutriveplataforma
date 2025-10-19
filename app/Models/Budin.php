<?php
// app/Models/Budin.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Click;

class Budin extends Model
{
    use HasFactory, SoftDeletes;

    // Nombre de la tabla en la base de datos
    protected $table = 'budines';

    // Campos que se pueden llenar desde un formulario
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