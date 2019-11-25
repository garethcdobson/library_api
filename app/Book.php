<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //// Only allow the title and article field to get updated via mass assignment
  protected $fillable = ["title", "pages", "published", "rating", "ISBN", "author_id"];

  // setup the other side of the relationship
  // use singular, as a comment only has one article
  public function author()
  {
    // a comment belongs to an article
    return $this->belongsTo(Author::class);
  }
}
