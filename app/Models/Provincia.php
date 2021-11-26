<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Provincia extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provincia';

    protected $fillable =[
        'id_departamento',
        'descripcion'
    ]

    public function departamentos(){
        return $this->belongsTo(Departamento::class);
    }

    public function distritos(){
        return $this->hasMany(Distrito::class);
    }
}
