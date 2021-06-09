<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCollection;

class BookServiceController extends Controller
{
    public function index()
    {
        return response()->json(
            BookCollection::where('user_id', auth()->user()->id)->with('collection_has_book', 'collection_has_user')->get()
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required',
        ]);
        $check = BookCollection::where('user_id', auth()->user()->id)->where('book_id', $request->book_id)->first();
        if(empty($check))
            try 
            {
                $bookCollection = new BookCollection();
                $bookCollection->user_id = auth()->user()->id;
                $bookCollection->book_id = $request->book_id;
                $bookCollection->save();

                return response()->json( [
                    'entity' => 'Book Collection', 
                    'action' => 'create', 
                    'result' => 'success'
                ], 201);

            } 
            catch (\Exception $e) 
            {
                return response()->json( [
                    'entity' => 'Book Collection', 
                    'action' => 'create', 
                    'result' => 'failed',
                    'msg' => $e
                ], 409);
            }
        else
            return response()->json( [
                'entity' => 'Book Collection', 
                'action' => 'create', 
                'result' => 'failed',
                'msg' => 'Book have already been taken'
            ], 500);
    }

    public function destroy($id)
    {
        try {
            $book = BookCollection::findOrFail($id);
            $book->delete();
            return response()->json( [
                'entity' => 'Book Collection', 
                'action' => 'delete', 
                'result' => 'success'
            ], 200);

        } 
        catch (\Exception $e) 
        {
            return response()->json( [
                'entity' => 'Book Collection', 
                'action' => 'delete', 
                'result' => 'failed',
                'msg' => $e
            ], 409);
        }
    }
}
