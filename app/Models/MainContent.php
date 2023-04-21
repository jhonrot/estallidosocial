<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainContent extends Model
{
    use HasFactory;

    //Relacion de uno a muchos

    public function secondarycontents(){
        return $this->hasMany(Secondary_Content::class);
    }

    //Relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}
