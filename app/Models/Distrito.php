<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_distrito';

    protected $fillable=[
        'id_provincia',
        'descripcion'
    ];

    public function provincias(){
        return $this->belongsTo(Provincia::class, 'foreign_key', 'owner_key');
    }
}
