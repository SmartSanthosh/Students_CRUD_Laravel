<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
    <body>
    <section style="padding-top:60px;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card">
							<div class="card-header text-center text-white" style="background-color: Gray;">
								<h1> Login</h1>
							</div>
                                    @if($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert"></button>
                                            <strong>{{$message}}</strong>
                                        </div>
                                    @endif

                                    @if(count($errors)>0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        {!! Form::open(array('route' => 'student.login','method'=>'POST') ) !!}
                                        <div class="container box">
                                            <div class="form-group">
                                                {!! Form::label('email', "Enter Email",array('class'=>'col-form-label')) !!}
                                                {!! Form::text('email', '', array('class'=>'form-control')) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('password', "Enter Password",array('class'=>'col-form-label')) !!}
                                                {!! Form::password('password', array('class'=>'form-control')) !!}
                                            </div>
                                            <div>
                                                {!! Form::submit('Submit', array('class'=>'btn btn-success my-2')) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
						    </div>
					</div>
				</div>
			</div>
		</section>
    </body>
</html>