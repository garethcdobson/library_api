<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ["first name", "last name"]; 

     // plural, as an article can have multiple comments
    public function books()
    {
        // use hasMany relationship method
        return $this->hasMany(Book::class);
    }
}

