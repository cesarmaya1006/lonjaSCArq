<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clinica extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'clinicas';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function areas()
    {
        return $this->hasMany(Area::class, 'clinica_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
