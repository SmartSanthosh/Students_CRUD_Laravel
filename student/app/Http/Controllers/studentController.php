<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;
use File;
use PDF;
// use Toastr;
use Validator;  
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class studentController extends Controller
{
    public $Student;
    public function addStudent(){
        return view('add-student');
    }
    public function __construct(Students $Studentmodel){
        $this->Students = $Studentmodel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'email'=>"required|email",  //unique:users,email|
            'image' => 'required|image|mimes:jpg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
    
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $data = $this->Students->createStudent($request->except('_token'), 'images'.'/'.$imageName);
        // Toastr::success('We will contact soon:)','success');
        return redirect('lists')->with('message','Record has been inserted successfully');
    }
    
    public function get(){
                
        $student = $this->Students->getStudent();

        return view('all-student',compact('student'));
    } 

    public function find($id){
        $students = $this->Students->editStudent($id);
        // $students = $this->Students->generatePDF($id);

        return view('edit-student',compact('students'));
    }

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

    public function delete($id){
        $student = $this->Students->deleteStudent($id);
        //return redirect('lists')->with('message','Data added Successfully');

        // Toastr::success('We will contact soon:)','success');
         return redirect('lists')->with('error','Record has been deleted successfully');
   }
   
   public function downloadPdf($id){
        $students = Students::find($id);
        $pdf= PDF::loadView('edit-student',compact('students'));
        return $pdf->download('edit.pdf');
   }

    // edit modal form

    public function getStudentId($id){
        $student=Students::find($id);
        return response()->json( $student);
    }
   
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
