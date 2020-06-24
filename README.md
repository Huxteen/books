# Book API Endpoints
Book API Endpoint with a seamless experience
# Requirement 1
###### > `REST API that calls an external API service( https://anapioficeandfire.com/Documentation#books ) to get information about books.`

# Requirement 2
###### > `A Simple and seamless CRUD Book API endpoint to CREATE, READ, UPDATE(PUT, PATCH), and Delete Book/Books`


# Installation

###### Clone the repository to your local directory
> `https://github.com/Huxteen/books.git`

###### Clone the repository command
> `git clone https://github.com/Huxteen/books.git`

#### Navigate into the project directory 'books' to start the server
###### Start the local server at port 8080
> `php -S localhost:8080  -t  public`

### Web Browser
###### Once the local server is started Navigate to your Web browser (Mozilla or Chrome preferred)
###### copy and paste the URL below to check if the app is running or has started
> `http://localhost:8080/`

##### If(message) { You should see the message on your browser }
> `Congratulation!!! your book API endpoints is running successfully.`




# Next Testing Our Sweet Endpoints


###### To be able to test this API you need a software development tool to enable you test calls to these endpoints. I used POSTMAN( https://www.postman.com/ ) for testing these endpoints and you can get download it from this URL( https://www.postman.com/ ).

###### The endpoints are made with the users thereby providing a seamless integration with a frontend Frame work like React, Vuejs or Others.

###### The databse has been populated with fake data of up to 150 entries, you are sure to have experience testing the endpoints.


## An overview of the API endpoint.

## Requirement 1

# Book API Endpoint
### GET - get all the books in the database
  > `/api/v1/books`
  ###### URL - You can paste the link below into your web browser to perform this GET request.
  > `http://localhost:8080/api/v1/books`
  ###### search Filters - You can filter the query result with any combination of 
  ###### name || country || publisher || year
  > `http://localhost:8080/api/v1/books?name=kunze`
  > `http://localhost:8080/api/v1/books?name=laudantium&country=united kingdom`
  > `http://localhost:8080/api/v1/books?name=laudantium&country=united kingdom&publisher=son`
  > `http://localhost:8080/api/v1/books?name=laudantium&country=united kingdom&publisher=son&year=2015`

### POST - Post a books to the database
  > `/api/v1/books`
  ###### URL
  > `http://localhost:8080/api/v1/books`

### PUT - To update a specific book data
  > `/api/v1/books/{id}`
  ###### URL
  > `http://localhost:8080/api/v1/books/50`


### PATCH - To update a specific book data
  > `/api/v1/books/{id}`
  ###### URL
  > `http://localhost:8080/api/v1/books/54`


### GET - To /retrieve specific book data
  > `/api/v1/books/{id}`
  ###### URL - You can paste the link below into your web browser to perform this GET request.
  > `http://localhost:8080/api/v1/books/50`


### DELETE - To delete a book
  > `/api/v1/books/{id}`
  ###### URL
  > `http://localhost:8080/api/v1/books/151`




## Requirement 1
# External Book Service Endpoint
### GET - get specific book or return an empty array if no match found
  > `/api/external-books`
###### URL - You can paste the link below into your web browser to perform this GET request.
  > `http://localhost:8080/api/external-books?name=A Game of Thrones`


### GET - gets all the book if no search query added
> `/api/external-books`
###### URL - - You can paste the link below into your web browser to perform this GET request.
  > `http://localhost:8080/api/external-books`


# TestCase

###### TestCase was written for the API end points. To run the test
###### Inside the Test folder
###### BookTest.php file
###### To run the test
  > `vendor/bin/phpunit`






# Thanks
