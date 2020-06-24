<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Traits\ApiResponser;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Image;

class BookController extends Controller
{   

    use ApiResponser;


    public function __construct()
    {
        //
    }

     /**
     * Make a request to External Services.
     * Using GuzzleHttp to make the request.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Requirement 1
    public function externalService(Request $request)
    {
      $client = new Client();
      $name = $request->get('name');
      $url = 'https://www.anapioficeandfire.com/api/books';
      if($name){$url .= '?name='.$name;}

      $res = $client->request('GET', $url);
      $data = json_decode($res->getBody()->getContents());
      
      return $this->successResponse($data);
    }
    // Requirement 1 Ends





    // Requirement 2
    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
      $country = ($request->get('country')? $request->get('country') : 'no-search');
      $name = ($request->get('name')? $request->get('name') : 'no-search');
      $publisher = ($request->get('publisher')? $request->get('publisher') : 'no-search');
      $year = ($request->get('year')? $request->get('year') : 'no-search');
      if($country || $name || $publisher || $year){
        $books = Book::query()
            ->where('name', 'LIKE', "%{$name}%") 
            ->orWhere('country', 'LIKE', "%{$country}%") 
            ->orWhere('publisher', 'LIKE', "%{$publisher}%") 
            ->orWhere('release_date', 'LIKE', "%{$year}%") 
            ->get();
      }else{ 
        $books = Book::all(); 
      }

      return $this->successResponse($books);


      

      
    }


    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => 'required|max:255',
        'isbn' => 'required|max:20',
        'author' => 'required|max:60',
        'country' => 'required|max:255',
        'number_of_pages' => 'required|min:1',
        'publisher' => 'required|max:255',
        'release_date' => 'required|date',
      ];

      $this->validate($request, $rules);

      $book = Book::create($request->all());
      
      return $this->successResponse($book, Response::HTTP_CREATED);


      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book, $id)
    {
      $book = Book::findOrFail($id);
      return $this->successResponse($book);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
  
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $rules = [
        'name' => 'max:255',
        'isbn' => 'max:20',
        'author' => 'max:60',
        'country' => 'max:255',
        'number_of_pages' => 'min:1',
        'publisher' => 'max:255',
        'release_date' => 'date',
      ];

      $this->validate($request, $rules);

      $book = Book::findOrFail($id);
      $book->fill($request->all());

      if($book->isClean()){
        return $this->errorResponse('Sorry, new value is same with old value.',
        Response::HTTP_UNPROCESSABLE_ENTITY);
      }
      $book->save();

      return $this->successResponseMessage($book, 'updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request, $id)
    {
      $book = Book::findOrFail($id);
      $book->delete();


      return $this->successResponseMessage($book, 'deleted');
     
    }


}
