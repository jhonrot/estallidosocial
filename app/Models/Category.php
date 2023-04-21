<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relacion de uno a muchos

    public function secondarycontents(){
        return $this->hasMany(Secondary_Content::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
