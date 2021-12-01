<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'provincia_id'
    ];

    public function provincias(){
        return $this->belongsTo(Provincia::class);
    }
}
