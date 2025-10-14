<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- REVISAR SI ES NECESARIO

class Click extends Model
{
    use HasFactory;
    protected $fillable = ['button_identifier', 'ip_address', 'user_agent'];

    public function clickable()
{
    return $this->morphTo();
}
}