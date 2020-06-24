<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;


class BookTest extends TestCase
{
    /**
     * A functional Book End Point.
     *
     * @return void
     */
    public function CreateBookTest()
    {
        $data = [
                'name' => 'The Legend',
                'isbn' => '123-7686969',
                'author' => 'Paul Donald',
                'country' => 'United Kingdom',
                'number_of_pages' => '150',
                'publisher' => 'Son Nig',
                'release_date' => '10-6-2019',
              ];
        $book = factory(\App\Book::class)->create();
        $response = $this->actingAs($book, 'api')->json('POST', '/api/v1/books', $data);
        $response->assertStatus(201);
        $response->assertJson(['status' => 'success']);
        $response->assertJson(['data' => $data]);
    }


    public function updateBookTest(){
        $data = [
            'name' => 'The Legend',
            'isbn' => '123-7686969',
            'author' => 'Paul Donald',
            'country' => 'United Kingdom',
            'number_of_pages' => '150',
            'publisher' => 'Son Nig',
            'release_date' => '10-6-2019',
          ];

        $this->put("api/v1/books/140", $data, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'isbn',
                    'author',
                    'country',
                    'number_of_pages',
                    'publisher',
                    'release_date'
                ]
            ]    
        );
    }

    public function testShouldReturnAllProducts(){

        $this->get("api/v1/books", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'name',
                    'isbn',
                    'author',
                    'country',
                    'number_of_pages',
                    'publisher',
                    'release_date',
                    'created_at',
                    'updated_at',
                ]
            ],
        ]);
        
    }


    /**
     * /book/id [GET]
     */
    public function getReturnSingleBookTest(){
        $this->get("api/v1/books/100", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'isbn',
                    'author',
                    'country',
                    'number_of_pages',
                    'publisher',
                    'release_date',
                    'created_at',
                    'updated_at',
                ]
            ]    
        );
        
    }


    /**
     * /book/id [GET]
     */
    public function getExternalBookTest(){
        $this->get("/api/external-books", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
              'status_code' => 200,
              'status' => 'success'
            ]
        );
    }





    /**
     * /book/id [DELETE]
     */
    // public function deleteBookTest(){
        
    //     $this->delete("api/v1/books/161", [], []);
    //     $this->seeStatusCode(200);
    //     $this->seeJsonStructure([
    //             'status_code',
    //             'status'
    //     ]);
    // }
}
