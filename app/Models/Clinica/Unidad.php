<?php

namespace App\Models\Clinica;

use App\Models\Empresa\Clinica;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Unidad extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'unidades';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function clinica()
    {
        return $this->belongsTo(Clinica::class, 'clinica_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
