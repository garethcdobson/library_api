<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookListResource;
use App\Http\Requests\BookRequest;
use App\Shop;


class Books extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the books
        return BookListResource::collection(Book::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // only get certain fields
        $data = $request->only(["title", "published", "author_id", "pages", "ISBN", "rating"]);
        $book = Book::create($data);

        // get back a collection of shop objects
        $shops = Shop::fromStrings($request->get("shops"));
     
        // sync the tags: needs an array of Shop ids
        $book->shops()->sync($shops->pluck("id")->all());
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // return the resource
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $article)
    {
        // only get certain fields
        $data = $request->only(["title", "published", "author_id"]);
        $book->fill($data)->save();
        // get back a collection of shop objects
        $shops = Shop::fromStrings($request->get("shops"));
        // sync the tags: needs an array of Shop ids
        $book->shops()->sync($shops->pluck("id")->all());
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // $book = Book::find($id);
        $book->delete();
  
        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
