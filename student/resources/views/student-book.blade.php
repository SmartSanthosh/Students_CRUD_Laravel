@extends('layouts.menu')
<body>
   <section style="padding-top:60px;">
      <div class="container">
         <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="card">
                  <div class="card-header text-center text-white" style="background-color: #00AA9E;">
                     <h1> Add Books</h1>
                  </div>
                  <div class="card-body">
                     {!! Form::open( array('route' => 'book.create','class'=>'form-horizontal needs-validation','novalidate', 'id'=>"studentForm", 'enctype' => "multipart/form-data") ) !!}
                     <div class="form-group">
                        {!! Form::label('Book_name', "Book Name",array('class'=>'col-form-label')) !!}
                        {!! Form::text('Book_name', '', array('class'=>'form-control', 'required', 'maxlength' => 10, 'minlength' => 1, 'id' => 'Book_name','placeholder' => "Book Name"))!!}
                     </div>
                     <div>
                        {!! Form::submit('Submit', array('class'=>'btn btn-success my-2', 'required','onchange'=>'previewFile(this)')) !!}
                        <a href="/book-show" class="btn btn-primary"> Back </a>
                     </div>
                     {!! Form::close()!!}
                  </div>
               </div>
            </div>
         </div>   
      </div>
      </div>
   </section>
</body>