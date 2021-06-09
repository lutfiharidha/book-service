<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return response()->json(
            Book::where('book_Status', 1)->get()
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
        ]);

        try 
        {
            $book = new Book();
            $book->book_name = $request->title;
            $book->book_description = $request->description;
            $book->book_status = $request->status;
            $book->save();

            return response()->json( [
                'entity' => 'book', 
                'action' => 'create', 
                'result' => 'success'
            ], 201);

        } 
        catch (\Exception $e) 
        {
            return response()->json( [
                'entity' => 'book', 
                'action' => 'create', 
                'result' => 'failed',
                'msg' => $e
            ], 409);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $this->validate($request, [
            'title' => 'required|string',
        ]);

        try 
        {
            $book = Book::findORFail($id);
            $book->book_name = $request->title;
            $book->book_description = $request->description;
            $book->book_status = $request->status;
            $book->save();

            return response()->json( [
                'entity' => 'book', 
                'action' => 'update', 
                'result' => 'success'
            ], 200);

        } 
        catch (\Exception $e) 
        {
            return response()->json( [
                'entity' => 'book', 
                'action' => 'update', 
                'result' => 'failed',
                'msg' => $e
            ], 409);
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
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json( [
                'entity' => 'book', 
                'action' => 'delete', 
                'result' => 'success'
            ], 200);

        } 
        catch (\Exception $e) 
        {
            return response()->json( [
                'entity' => 'book', 
                'action' => 'delete', 
                'result' => 'failed',
                'msg' => $e
            ], 409);
        }
    }
}
