<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Students;


class Books extends Model
{
    use HasFactory;
    protected $table ="books";
    public $fillable=['Book_name'];

    public function createBook($data){        
        $Book = Books::create($data);
        return $Book->id;
    }
    public function getBook(){
        $book = Books::get();
         return $book;
    }
    public function editBook($id){
        $book = Books::find($id);
        return $book;
    }

    public function updateBook($data){
        //dd($data);
        $book = Books::find($data["id"]); 
        $book->update($data);
        return $book;  
    }
    public function deleteBook($id){
        $book = Books::find($id);
        $book->delete();
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'stud_books', 'book_id', 'id');
    }
}
