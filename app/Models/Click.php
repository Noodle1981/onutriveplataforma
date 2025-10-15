<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- REVISAR SI ES NECESARIO

class Click extends Model
{
    protected $fillable = [
        'clickable_id',
        'clickable_type',
        'ip_address',
        'user_agent'
    ];
    public function clickable()
{
    return $this->morphTo();
}
}