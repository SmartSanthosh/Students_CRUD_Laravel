
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Students</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- alpha/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
      <section style="padding-top:70px;">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header text-center text-white" style="background-color: DarkRed;">
                    <a href="/logout" class="btn btn-primary float-end"> logout </a>
                    <h1>Student List</h1> <a href='/add-student' class="btn btn-success float-end">Add New Students</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form id="studentFrom">
                              @csrf
                              <input type="hidden" id="id" name="id" />
                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" id="address"></input>
                                </div>
                            </form>
                              <!-- {!! Form::label('address',"Address",array('class'=>'col-form-label')) !!}
                              {!! Form::text('address','', array('class'=>'form-control','required','placeholder' => "Address"))!!}	 -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <!-- <button  type="button" class="btn btn-primary">Save changes</button> -->
                              <a href="/edit-student/{{$students->id}}" class="btn btn-success">Edit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="card-body">
                    <div class="panel panel-default">
                        <!-- @if (session('success'))
                            <div class="alert alert-danger">{{ session('success') }}</div>
                        @endif -->
                    </div>
                      <table class="table table-stripped table-bordered">
                        <thead class="thead-dark">
                          <tr class="bg-info">
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Reg.No</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Phono Number</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($student as $students)
                            <tr>
                              <td>{{$students->id}}</td>
                              <td>{{$students->firstname}}</td>
                              <td>{{$students->lastname}}</td>
                              <td>{{$students->regno}}</td>
                              <td>{{$students->age}}</td>
                              <td>{{$students->gender}}</td>
                              <td>{{$students->department}}</td>
                              <td>{{$students->email}}</td> 
                              <td>{{$students->phono}}</td>
                              <td>{{$students->address}}</td>
                              <td>
                                  @if(@$students->image)
                                      <img src="/{{$students->image}}" width="75"/>
                                  @endif
                              </td>
                              <td>
                                  <a href="/edit-student/{{$students->id}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                  <a href="/delete-student/{{$students->id}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                                  <a href="/editpage/{{$students->id}}" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                  <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</a>
                              </td>
                            </tr>
                          @endforeach 
                        </tbody>
                      </table>
                  </div> 
              </div>
            </div>
          </div>
        </div>
      </section>
      <div>
        <!-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!} -->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <!-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!} -->
 <script>
        $('.delete-confirm').on('click', function (event) {
          event.preventDefault();
          const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    
</script>
<!-- <script>
@if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif
</script> -->
<script>
    function editStudent(id){
      $.get('/students/'+id,function(student){
        $("#id").val(student.id);
        $("#address").val(student.address);
      })
    } 
</script>



</body>
</html>