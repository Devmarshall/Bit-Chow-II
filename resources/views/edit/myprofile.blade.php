@extends('layouts.profile') 
@section('content-profile')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3>Update your Profile</h3>
                </div>
                {{--
                <div>
                    <img src="{{$user->avatar}}" alt="my_avatar">
                </div> --}}
                <div class="card-body">
                    <div class="container-fluid">
                        {!! Form::open(['action' => 'UserController@updateProfile','method'=>'POST','files'=>'true']) !!}

                        <div class='form-group row'>
                            {{Form::label('title','First Name')}} {{Form::text('f_name',$user->f_name,['class'=>'form-control', 'placeholder'=>$user->f_name])}}
                        </div>

                        <div class='form-group row'>
                            {{Form::label('title','Last Name')}} {{Form::text('l_name',$user->l_name,['class'=>'form-control', 'placeholder'=>$user->l_name])}}
                        </div>

                        <div class='form-group row'>
                            {{Form::label('title','User Handle')}} {{Form::text('user_handle',$user->user_handle,['class'=>'form-control', 'placeholder'=>$user->user_handle])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('title','My Avatar (Optional)')}} {{Form::file('avatar', ['type'=>'file','class'=>'form-control'])}}
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    <p>You can leave the "My Avatar" field alone if you don not want to update it</p>
                </div>
            </div>
        </div>
    </div>
</div>








@stop