<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{

    // name should be fillable
    protected $fillable = ["name"];

    // accepts the array of strings from the request
    public static function fromStrings(array $strings)
    {
        return collect($strings)->map(function ($string) {

            // trim any whitespace around string
            return trim($string);

        })->map(function ($string) {

            // check if it's in the database
            $format = Format::where("name", $string)->first();

            // if tag exists return it, otherwise create a new one
            return $format ? $format : Format::create(["name" => $string]);
        });
    }

    // don't need timestamps
    public $timestamps = false;

    // using the belongsToMany() method as it's a many-to-many relationship
    public function books()
    {
    return $this->belongsToMany(Book::class);
    }
}