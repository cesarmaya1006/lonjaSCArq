<?php

namespace App\Models\Clinica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tiempo extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'tiempos';
    protected $guarded = [];
}
