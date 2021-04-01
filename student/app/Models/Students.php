<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Models\Books;
//use App\Models\Students;

class Students extends Model
{
    use SoftDeletes, HasFactory;
    protected $table ="student";
    public $fillable=['firstname','lastname','regno','age','gender','department','email','phono','address','image'];

    public function createStudent($data, $image_path){

        $BookId = $data['Book'];
        $data['image'] = $image_path;

        $Student = Students::create($data);

        $to_name = "santhosh";
        $to_email = $data['email'];
        $data = [];
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("Laravel Test Mail");
            $message->from("santhoshmor@processdrive.com", 'hello');
        });
        //dd($BookId);

        $Student->book()->detach();
        //dump("hello santhosh");
        //dd($BookId);
        // dd($data['Book']);
        if (@$BookId) {
            // dump("heelloo");
            // dd($BookId);
           foreach ($BookId as $value) { // [1, 3, 8]
               $Student->book()->attach($value);
           }
       }
        // dd($data['Book'],$Student->id);
        return $Student->id;
    }

    public function getStudent(){
        $student = Students::with('book')->get();
        return $student;
    }

    public function editStudent($id){
        $student = Students::find($id);
        return $student;
    }

    public function updateStudent($data,$image_path){
        $student = Students::findorFail($data["id"]);
        if ($image_path) {
             $data['image'] = $image_path;
              $oldImage='/'.$student->image;
             $oldPath=str_replace('\\','/',public_path());
            if(file_exists($oldPath.$oldImage)){
                unlink($oldPath.$oldImage);
            }
        }
        $student->update($data);
        return $student;
    }

    public function deleteStudent($id){
        $deleteImage = Students::find($id);
        $image = $deleteImage->image;
        if ($image) {
            unlink($image);
            $deleteImage->delete();
        }
    }

    public function updateStudentAddress ($data){
        //dd($data);
        $student = Students::findorFail($data["id"]);
        $student->update($data);
        return $student;
    }
    // public function storeData($student_id,$book_id){

    // }
    public function book()
    {
        return $this->belongsToMany('App\Models\Books', 'stud_books', 'student_id', 'book_id');
    }
}
