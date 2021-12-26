<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::al();
        $data = $books->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            "message" => 'Got the books',
        ];

        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name'=>'required',
            'author'=>'required'
        ]);

        if($validator->false()){
            $response = [
                'success' => false,
                'data' => 'Validation Error',
                "message" => $validator->errors(),
            ];
            return response()->json($response,404);

        }
        $book = Book::create($input);
        $data = $book->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            "message" => 'Book Stored',
        ];
        return response()->json($response,200);

    }

    /**
     * Display the specified resouprice
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name'=>'required',
            'author'=>'required'
        ]);

        if($validator->false()){
            $response = [
                'success' => false,
                'data' => 'Validation Error',
                "message" => $validator->errors(),
            ];
            return response()->json($response,404);

        }
        $book->name = $input['name'];
        $book->author = $input['author'];
        $book->save();

        $response = [
            'success' => true,
            'data' => $data,
            "message" => 'Book updated',
        ];
        return response()->json($response,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book->delete();
        $data = $book->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            "message" => 'Book deleted',
        ];
        return response()->json($response,200);
    }
}
