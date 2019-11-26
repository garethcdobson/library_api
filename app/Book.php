<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  // Only allow the title and article field to get updated via mass assignment
  protected $fillable = ["title", "pages", "published", "rating", "ISBN", "author_id"];

  // accepts the array of strings from the request
  public static function fromStrings(array $strings)
  {
    return collect($strings)->map(function ($string) {

      // trim any whitespace around string
      return trim($string);
    })->map(function ($string) {

      // check if it's in the database
      $book = Book::where("id", $string)->first();

      // if tag exists return it, otherwise create a new one
      return $book ? $book : Book::create(["id" => $string]);
    });
  }

  // don't need timestamps
  public $timestamps = false;

  // setup the other side of the relationship
  // use singular, as a comment only has one article
  public function author()
  {
    // a comment belongs to an article
    return $this->belongsTo(Author::class);
  }

  // use the belongsToMany() method again
  public function shops()
  {
    return $this->belongsToMany(Shop::class);
  }
}
