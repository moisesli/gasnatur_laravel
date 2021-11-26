<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_departamento';

    protected $fillable =[
        'descripcion'
    ];

    public function provincias(){
        return $this->hasMany(Provincia::class);
    }
}
