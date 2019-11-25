<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookListResource;
use App\Http\Requests\BookRequest;


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
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // create book with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request
        return Book::create($data);
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
    public function update(BookRequest $request, Book $book)
    {
        // find the article with the given id
        // $book = Book::find($id);
    
        // get the request data
        $data = $request->all();

        // update the article using the fill method
        // then save it to the database
        $book->fill($data)->save();

        // return the resource
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
