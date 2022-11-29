<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validator = Validator::make($input, [
            'title'         => 'required',
            'author'        => 'required',
            'publisher'     => 'required',
        ]);
        if($validator-> fails())
        {
            return $this->sendError('Validation Error',$validator->errors()); 
        }
        $book = Book::create($input); 
        return response()->json([
        'success' => true, 
        'message' => 'Book Record Created Successfully', 
        'book'   =>$book 
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
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
        if(Book::where('id', $id)->exists())
        {
            $book = Book::find($id);
            $book->title = $request->title; 
            $book->author = $request->author; 
            $book->publisher = $request->publisher; 
            $book->save();
            return response()->json()([
                'message' => 'Book information update successfully'
            ], 200);
        } else 
        {
            response()->json([ 
                'message' => 'Book Record Not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Book::where('id', $id)->exists())
        {
            $book = Book::find($id);
            $book->delete(); 
            return response()->json()([
                'message' => 'Book information Delete successfully'
            ], 200);
        } else 
        {
            response()->json([ 
                'message' => 'Book Record Not found'
            ], 404);
        }
    }
}
