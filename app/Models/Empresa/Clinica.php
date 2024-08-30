<?php

namespace App\Models\Empresa;

use App\Models\Clinica\Unidad;
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
    //----------------------------------------------------------------------------------
    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'clinica_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
