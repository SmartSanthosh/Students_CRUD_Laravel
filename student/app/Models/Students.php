<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class Students extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table ="student";
    public $fillable=['firstname','lastname','regno','age','gender','department','email','phono','address','image'];
    
    public function createStudent($data, $image_path){
        
        //dd($data['email']);
        $data['image'] = $image_path;
        $Student = Students::create($data);

        $to_name = "santhosh";
        $to_email = $data['email'];

        $data = [];

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Laravel Test Mail");
        $message->from("santhoshmor@processdrive.com", 'ProcessDrive');
        });


        // //dd($data['email']);
        // $data['image'] = $image_path;
        //  $Student = Students::create($data);

        //  $to_name = "santhosh";
        // $to_email = "santhosh@processdrive.com";

        // $data = [];

        // Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        // ->subject("Laravel Test Mail");
        // $message->from("david@processdrive.com", "processdrive");
        // });
        // //dd($data['regno']);
        // $val=Mail::to($data['email'])->send(new sendMail($data['regno']));
        // dump($val); 
        // dd($data['regno']);
        // dd("hi da");
        return $Student->id;
    }

    public function getStudent(){
   
        $student = Students::get();

        return $student;
    }

    public function editStudent($id){
    //dump("dai");
        $student = Students::find($id);
        // dd($student);
        return $student;
    }

    public function generatePDF($id)
    {
        //dd($id);
        // $student = Students::find($id);
        // $pdf = PDF::loadView('edit-student');    
        // return $pdf->download('studentlist.pdf');
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
        $student ->update($data);
        return $student;  
    }

    public function deleteStudent($id){
        $deleteImage= Students::find($id);
        $image = $deleteImage->image;
     
        if($image){
        unlink($image);
        $deleteImage->delete();
        } 
    }
}
