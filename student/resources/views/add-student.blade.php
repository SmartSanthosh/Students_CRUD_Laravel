@extends('layouts.menu')
    <body>
        <section style="padding-top:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-center text-white" style="background-color: #00AA9E;">
                                <h1> Add New Student</h1>
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
                                {!! Form::open( array('route' => 'student.create','class'=>'form-horizontal needs-validation','novalidate', 'id'=>"studentForm", 'enctype' => "multipart/form-data") ) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('firstname', "First Name",array('class'=>'col-form-label')) !!}
                                            {!! Form::text('firstname', '', array('class'=>'form-control', 'required', 'maxlength' => 50, 'minlength' => 2, 'id' => 'firstname', 'placeholder' => "First name", 'pattern' => "^[^ 0-9][a-z A-Z]*$")) !!}
                                            <div class="invalid-feedback">Please fill the Firstname</div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('regno', "Register Number",array('class'=>'col-form-label')) !!}
                                            {!! Form::text('regno', '', array('class'=>'form-control', 'required', 'maxlength' => 5, 'minlength' => 3, 'placeholder' => "Register Number"))!!}
                                        </div>
                                        <div class="form-group ">
                                            {!! Form::label('', "Choose gender",array('class'=>'col-form-label')) !!}<br>
                                            {!! Form::radio('gender', 'male', false,array('class'=>'required', 'id'=>'male'))!!}
                                            {!! Form::label('', "male",array('class'=>'col-form-label')) !!}<br>
                                            {!! Form::radio('gender', 'female', false,array('class'=>'required','id'=>'female'))!!}
                                            {!! Form::label('', "female",array('class'=>'col-form-label')) !!}<br>
                                            {!! Form::radio('gender', 'other', false,	array('class'=>'required', 'id'=>'other'))!!}
                                            {!! Form::label('', "other",array('class'=>'col-form-label')) !!}<br>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email',"Email",array('class'=>'col-form-label')) !!}
                                            {!! Form::text('email', '', array('class'=>'form-control','placeholder' => "Email"))!!}
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('address',"Address",array('class'=>'col-form-label')) !!}
                                            {!! Form::text('address', '', array('class'=>'form-control','required','placeholder' => "Address"))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Book', "Book",array('class'=>'col-form-label')) !!}
                                            {!! Form::select('Book[]',$Books,null, array('class'=>"selectpicker","multiple data-live-search"=>true))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('lastname', "Last Name",array('class'=>'col-form-label')) !!}
                                            {!! Form::text('lastname', '', array('class'=>'form-control', 'required', 'maxlength' => 10, 'minlength' => 1, 'id' => 'lastname', 'placeholder' => "Last name", 'pattern' => "^[^ 0-9][a-z A-Z]*$")) !!}
                                            <div class="invalid-feedback">Please fill the Lastname</div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('age', "Age",array('class'=>'col-form-label')) !!}
                                            {!! Form::number('age', '', array('class'=>'form-control', 'required', 'min' => 17, 'max' => 35, 'placeholder' => "Age", 'pattern' => "/^-?\d+\.?\d*$/")) !!}
                                            <div class="invalid-feedback">Please fill the Age limit 17 to 35</div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('department', "Department",array('class'=>'col-form-label')) !!}
                                            {!! Form::select('department', ['BE(CSE)'=>'BE(CSE)','BE(ECE)'=>'BE(ECE)','BCA'=>'BCA','MCA'=>'MCA'],'', array('class'=>'form-control', 'required', 'min' => 17, 'max' => 35))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('phono', "Phone Number (Fromat:xxx-xxxx-xxx)",array('class'=>'col-form-label')) !!}
                                            {!! Form::tel('phono', '', array('class'=>'form-control', 'required', 'placeholder' => "Phone Number", 'pattern' => "^\d{3}-\d{4}-\d{3}$",'onKeyPress'=>'if(this.value.length==12) return false;')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('image', "Choose a Image",array('class'=>'col-form-label')) !!}
                                            {!! Form::file('image', array('class'=>'form-control', 'required','onchange'=>'previewFile(this)')) !!}
                                            <img id="previewImg" style= "max-width:130px;margin-top:20px;"/>
                                            @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            {!! Form::submit('Submit', array('class'=>'btn btn-success my-2', 'required','onchange'=>'previewFile(this)')) !!}
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
        <script>

            function previewFile(input) {
            	var file = $("input[type=file]").get(0).files[0];
            	if (file) {
            		var reader = new FileReader();
            		reader.onload = function() {
            			$('#previewImg').attr("src", reader.result);
            		}
            		reader.readAsDataURL(file);
            	}
            }
        </script>
    </body>
</html>
