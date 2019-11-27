# Library API built with Laravel
------------------------------------- <br>
## Route Structure <br>
### Authors <br>
POST api/authors -> Create a new authors <br>
GET api/authors -> Get a list of all authors <br>
DELETE api/authors/{author} -> Delete specific author <br>
PUT api/authors/{author} -> Update a specific author <br>
GET  api/authors/{author}/books -> Get a list of all books by a certain author <br>

### Books <br>
POST api/books -> Store a new book <br>
PUT api/books/{book} -> Update a specific book <br>
DELETE api/books/{book} -> Delete a specific book <br>
GET api/books -> Get a list of all books <br>
GET api/books/{book} -> Get a specific book <br>
GET api/books/{book}/shops -> Get a list of all shops at book is sold in <br>

### Shops <br>
POST api/shops -> Store a new shop <br>
PUT api/shops/{shop}/books -> Update a specific shop with a list of books <br>
GET api/shops/{shop}/books -> Get a list of all the books a specific shop sells <br>
