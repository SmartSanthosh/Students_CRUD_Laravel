<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Student</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<section style="padding-top:60px;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card">
							<div class="card-header text-center text-white" style="background-color: #00AA9E;">
								<h1> Edit Student</h1> 
							</div>
							<div class="card-body">
								@if(count($errors)>0)
										<div class="alert alert-danger">
												<ul>
													@foreach($errors->all() as $error)
														<li>{{$error}}</li>
													@endforeach
												</ul>
										</div>
								@endif
								{!! Form::open( array('route' => 'student.update','class'=>'form-horizontal needs-validation','novalidate', 'id'=>"studentForm", 'enctype' => "multipart/form-data") ) !!}
								 <input type="hidden" name="id" value="{{$students->id}}"/>
									<div class="row">
										<div class="col-md-6">
												<div class="form-group"> 
														{!! Form::label('firstname', "First Name",array('class'=>'col-form-label')) !!}
														{!! Form::text('firstname', $students->firstname, array('class'=>'form-control', 'required', 'maxlength' => 50, 'minlength' => 2, 'id' => 'firstname', 'placeholder' => "First name", 'pattern' => "^[^ 0-9][a-z A-Z]*$")) !!}
														<div class="invalid-feedback">Please fill the Firstname</div> 
												</div>
												<div class="form-group">
														{!! Form::label('regno', "Register Number",array('class'=>'col-form-label')) !!}
														{!! Form::text('regno', $students->regno, array('class'=>'form-control', 'required', 'maxlength' => 5, 'minlength' => 3, 'placeholder' => "Register Number"))!!}
												</div>
												<div class="form-group ">
														{!! Form::label('', "Choose gender",array('class'=>'col-form-label')) !!}<br>
															{!! Form::radio('gender', 'male',$students->gender=='male'?true:false,array('class'=>'required', 'id'=>'male'))!!}
														{!! Form::label('', "male",array('class'=>'col-form-label')) !!}<br>
															{!! Form::radio('gender', 'female',$students->gender=='female'?true:false, array('class'=>'required','id'=>'female'))!!}
														{!! Form::label('', "female",array('class'=>'col-form-label')) !!}<br>
															{!! Form::radio('gender', 'other',$students->gender=='other'?true:false, array('class'=>'required', 'id'=>'other'))!!}
														{!! Form::label('', "other",array('class'=>'col-form-label')) !!}<br>
												</div>
												<div class="form-group">
														{!! Form::label('email',"Email",array('class'=>'col-form-label')) !!}
														{!! Form::text('email',$students->email, array('class'=>'form-control','placeholder' => "Email"))!!}			
														@if ($errors->has('email'))
														<span class="text-danger">{{ $errors->first('email') }}</span>
														@endif
												</div>
												<div class="form-group">
														{!! Form::label('address',"Address",array('class'=>'col-form-label')) !!}
														{!! Form::text('address',$students->address, array('class'=>'form-control','required','placeholder' => "Address"))!!}	
												</div> 
										</div>

										<div class="col-md-6">
												<div class="form-group"> 
															{!! Form::label('lastname', "Last Name",array('class'=>'col-form-label')) !!}
															{!! Form::text('lastname', $students->lastname, array('class'=>'form-control', 'required', 'maxlength' => 10, 'minlength' => 1, 'id' => 'lastname', 'placeholder' => "Last name", 'pattern' => "^[^ 0-9][a-z A-Z]*$")) !!}
														<div class="invalid-feedback">Please fill the Lastname</div> 
												</div>
												<div class="form-group">
															{!! Form::label('age', "Age",array('class'=>'col-form-label')) !!}
															{!! Form::number('age',$students->age, array('class'=>'form-control', 'required', 'min' => 17, 'max' => 35, 'placeholder' => "Age", 'pattern' => "/^-?\d+\.?\d*$/")) !!}
														<div class="invalid-feedback">Please fill the Age limit 17 to 35</div>  
												</div>
												<div class="form-group">
														{!! Form::label('department', "Department",array('class'=>'col-form-label')) !!}
														{!! Form::select('department',['BE(CSE)'=>'BE(CSE)','BE(ECE)'=>'BE(ECE)','BCA'=>'BCA','MCA'=>'MCA'],$students->department, array('class'=>'form-control', 'required', 'min' => 17, 'max' => 35))!!}
												</div>
												<div class="form-group">
															{!! Form::label('phono', "Phone Number (Fromat:xxx-xxxx-xxx)",array('class'=>'col-form-label')) !!}
															{!! Form::tel('phono',$students->phono, array('class'=>'form-control', 'required', 'placeholder' => "Phone Number", 'pattern' => "^\d{3}-\d{4}-\d{3}$",'onKeyPress'=>'if(this.value.length==12) return false;')) !!}
												</div>
												<div class="form-group">
														{!! Form::label('image', "Choose a Image",array('class'=>'col-form-label')) !!}
														{!! Form::file('image', array('class'=>'form-control')) !!}
														{!! Form::hidden('oldImage',$students->image, array('class'=>'form-control')) !!}
														@if(@$students->image)
																<img src="/{{ $students->image }}" width="75"/>
														@endif
												</div>
											<div>
												{!! Form::submit('Update', array('class'=>'btn btn-success my-2', 'required','onchange'=>'previewFile(this)')) !!}
											<a href="/lists" class="btn btn-primary"> Back </a>
											</div>
										</div>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script>
			(function() {
				window.addEventListener('load', function() {
					// Get the forms we want to add validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})(); 
		</script> 
	</body>
</html>