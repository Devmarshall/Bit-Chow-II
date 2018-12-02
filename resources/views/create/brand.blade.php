@extends('layouts.app') 
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">



            <div class="card">
                <div class="card-header">
                    <h2>Create your Brand</h2>
                </div>

                <div class="card-body">

                    <div class="container-fluid">

                        {!! Form::open(['action' => 'BrandController@create','method'=>'POST','files'=>'true']) !!}


                        <div class='form-group row'>
                            {{Form::label('title','Name')}} {{Form::text('name','',['class'=>'form-control', 'placeholder'=>'Name of Brand'])}}
                        </div>

                        <div class='form-group row'>
                            {{Form::label('title','Official Brand Email')}} {{Form::email('email','',['class'=>'form-control', 'placeholder'=>'brand@xyz.com'])}}
                        </div>

                        <div class='form-group'>
                            {{Form::label('title','Brand Description')}} {{Form::textarea('description','',['class'=>'form-control', 'placeholder'=>'Description', 'maxlength'=>'190'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('title','Brand Avatar (Optional)')}} {{Form::file('avatar', ['type'=>'file','class'=>'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('title','Founded On')}} {{Form::date('founded_on','',['class'=>'form-control', 'id'=>'founded_on'])}}
                            <script>
                                founded_on.max = new Date().toISOString().split("T")[0];
                            </script>
                        </div>

                        <div class='form-group row'>
                            {{Form::label('title','Slogan/Tagline (Optional)')}} {{Form::text('slogan','',['class'=>'form-control', 'placeholder'=>'Slogan'])}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



































@stop