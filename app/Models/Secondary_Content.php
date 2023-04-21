<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secondary_Content extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa

    public function maincontent(){
        return $this->belongsTo(MainContent::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion uno a muchos polimorfica

    public function image(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
