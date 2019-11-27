<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->post("books", "Books@store");
$router->get("books", "Books@index");
$router->put("books/{book}", "Books@update");
$router->delete("books/{book}", "Books@destroy");
$router->get("books/{book}", "Books@show");

// one-to-many routing
$router->group(["prefix" => "authors"], function ($router) {
    // author routes
    $router->post("", "Authors@store");
    $router->put("{author}", "Authors@update");
    $router->get("", "Authors@index");
    $router->delete("{author}", "Authors@destroy");

    // book routes
    $router->post("{author}/books", "Books@store");
    $router->get("{author}/books", "Authors@show");
});

// many-to-many routes
// shop routes
$router->post("shops", "Shops@store");
$router->put("shops/{shop}/books", "Shops@update");
$router->get("shops/{shop}/books", "Shops@show");
$router->get("books/{book}/shops", "Shops@index");

// format routes
$router->get("books/{book}/formats", "Formats@index");
$router->get("formats/{format}/books", "Formats@show");

