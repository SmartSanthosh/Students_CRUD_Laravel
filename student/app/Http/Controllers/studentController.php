<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\DataTables\StudentDataTable;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Books;
use File;
use PDF;
// use Toastr;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class studentController extends Controller
{
    public $Student;

    public function __construct(Students $Studentmodel){
        $this->Students = $Studentmodel;
    }

    public function addStudent() {
        //dd($data);
        $data['Books'] = Books::pluck('Book_name','id');
        return view('add-student',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('show-student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * d.ph
     *
     *
     */
    public function create(Request $request)
    {
        //dd("here");
        $request->validate([
            'email'=>"required|email",  //unique:users,email|
            'image' => 'required|image|mimes:jpg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $data = $this->Students->createStudent($request->except('_token'), 'images'.'/'.$imageName);
        return redirect('lists')->with('message','Record has been inserted successfully');
    }

    //Get All student record in Database
    public function get(){
        // $user = auth()->user();
        // dd($user["name"]);

        $student = $this->Students->getStudent();
        return view('all-student',compact('student'));
    }

    // Find and Edit the Single record in database
    public function find($id){
        // $data['Books'] = Books::pluck('Book_name','id');
        //dd($data['Books']);
        $students = $this->Students->editStudent($id);
        if ($students) {
            $data['Books'] = Books::pluck('Book_name','id');
            // dd($data['Books']);
            return view('edit-student',compact('students'));
        }
        return redirect('lists')->with('message','Record not found');
    }

    //Update the perticular Student record in database
    public function update(Request $request){
        $request->validate([
            'email'=>"required|email",
        ]);
        $imageName = '';
        if($request->image){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        $data = $this->Students->updateStudent($request->except('_token'),$imageName ? 'images'.'/'.$imageName : '');
        return redirect('lists')->with('message','Record has been Updated successfully');
    }

    //Delete the perticular Student Record in database
    public function delete($id){
        $student = $this->Students->deleteStudent($id);
         return redirect('lists')->with('error','Record has been deleted successfully');
   }

   //Download the Pdf file
    public function downloadPdf($id){
        $students = Students::find($id);
        $pdf= PDF::loadView('edit-student',compact('students'));
        return $pdf->download('edit.pdf');
   }

    // edit modal form
    public function getStudentId($id){
        $student = Students::find($id);
        return response()->json( $student);
    }

   //Update the modal form
    public function updatestudentaddress(Request $request) {
         $data = $this->Students->updateStudentAddress($request->except('_token'));
    }
}
