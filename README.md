## Library API built with Laravel

# Route Structure

| Domain | Method   | URI                        | Name | Action                               | Middleware   |
+--------+----------+----------------------------+------+--------------------------------------+--------------+
|        | GET|HEAD | /                          |      | Closure                              | web          |
|        | POST     | api/authors                |      | App\Http\Controllers\Authors@store   | api          |
|        | GET|HEAD | api/authors                |      | App\Http\Controllers\Authors@index   | api          |
|        | DELETE   | api/authors/{author}       |      | App\Http\Controllers\Authors@destroy | api          |
|        | PUT      | api/authors/{author}       |      | App\Http\Controllers\Authors@update  | api          |
|        | POST     | api/authors/{author}/books |      | App\Http\Controllers\Books@store     | api          |
|        | GET|HEAD | api/authors/{author}/books |      | App\Http\Controllers\Authors@show    | api          |
|        | GET|HEAD | api/books                  |      | App\Http\Controllers\Books@index     | api          |
|        | POST     | api/books                  |      | App\Http\Controllers\Books@store     | api          |
|        | PUT      | api/books/{book}           |      | App\Http\Controllers\Books@update    | api          |
|        | DELETE   | api/books/{book}           |      | App\Http\Controllers\Books@destroy   | api          |
|        | GET|HEAD | api/books/{book}           |      | App\Http\Controllers\Books@show      | api          |
|        | GET|HEAD | api/books/{book}/shops     |      | App\Http\Controllers\Shops@index     | api          |
|        | POST     | api/shops                  |      | App\Http\Controllers\Shops@store     | api          |
|        | PUT      | api/shops/{shop}/books     |      | App\Http\Controllers\Shops@update    | api          |
|        | GET|HEAD | api/shops/{shop}/books     |      | App\Http\Controllers\Shops@show      | api          |
|        | GET|HEAD | api/user                   |      | Closure                              | api,auth:api
