<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    public $Book;

    public function __construct(Books $Bookmodel){
        $this->Books = $Bookmodel;
    }


    public function addBook() {
        return view('add-book');
    }

    public function create(Request $request)
    {
        $data = $this->Books->createBook($request->except('_token'));
        return redirect('book-show')->with('message','Record has been inserted successfully');
    }
    public function get(){   
        $books = $this->Books->getBook();
        return view('all-book',compact('books'));
    } 
    // Find and Edit the Single record in database
    public function find($id){
        $books = $this->Books->editBook($id);
        if ($books) {
            return view('edit-book',compact('books'));
        }
        return redirect('book-show')->with('message','Record not found');
    }

    //Update the perticular Student record in database
    public function update(Request $request){
        $data = $this->Books->updateBook($request->except('_token'));
        return redirect('book-show')->with('message','Record has been Updated successfully');
    }

    
    //Delete the perticular Student Record in database
    public function delete($id){
        $book = $this->Books->deleteBook($id);
         return redirect('book-show')->with('error','Record has been deleted successfully');
   }

}
   