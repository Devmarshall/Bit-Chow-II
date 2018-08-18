@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img id="home-profile-left-user-avatar" class="card-img-top" src={{ Auth::user()->avatar }}>
                        </div>
                        <div class="col-md-8">
                            <div id="home-profile-left-user-details">
                                <a href="#"><b>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }} </b></a><br>
                                <a href="#">@ {{ Auth::user()->user_handle }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-sm-6">
                                <b>Pals</b><br> 123
                            </div>
                            <div class="col col-sm-6">
                                <b>Contacts</b><br> 123
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <div class="card">
                <div class="card-header">
                    Suggested Brands
                </div>
                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, dolore illum magnam perspiciatis quibusdam harum dignissimos
                    dolor, culpa, est corrupti quod non asperiores accusamus id eos neque aut voluptatibus? Deleniti.
                </div>
            </div>

        </div>

        <div class="col-md-6">
            @yield('content-home')
        </div>

        <div class="col-md-2">
            <div class="card">

                <div class="card-header">
                    My Brands
                </div>

                @if(sizeof($managed_brands)!==0) @foreach ($managed_brands as $managed_brand)

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img id="home-profile-right-brand-avatar" class="card-img-top" src={{ $managed_brand->avatar }}>
                        </div>
                        <div class="col-md-8">

                            <div id="home-profile-right-brand-details">
                                <a href="#"><b>{{ $managed_brand->name }}</b></a><br>
                                <a href="#">{{$managed_brand->email}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="margin-top:10%;">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-sm-6">
                                <b>Pals</b><br> {{$managed_brand->followers}}
                            </div>
                            <div class="col col-sm-6">
                                <b>Score</b><br> {{$managed_brand->score}}
                            </div>
                        </div>
                    </div>

                   
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newpost_modal">
                            New Post 
                        </button>

                </div>


                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="newpost_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{$managed_brand->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="card">
                                        {!! Form::open(['route'=>['create.post'],'method'=>'POST', 'files' => true]) !!}
                                        <div class="card-body">


                                            {{Form::hidden('brand_id', $managed_brand->id)}}

                                            <div class='form-group'>
                                                {{Form::label('title','Post text')}} {{Form::textArea('text','',['class'=>'form-control', 'placeholder'=>'Maximum text of 191 characters', 'maxlength'=>'191'])}}
                                            </div>
                                            <div class='form-group'>

                                                {{Form::label('title', 'Post Image')}}
                                                {{Form::file('img', ['type'=>'file','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="container">
                                                <div class="row content-justify-center">
                                                    <div class="float-right col-sm-6">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    <div class="float-right col-sm-6">
                                                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}} {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


                @else

                <div class="card-body">
                    <div class="container-fluid">
                        No brands here
                    </div>

                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            Add a brand to manage
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <a href="{{ url('/create/brand') }}">
                                    <i class="fas fa-plus fa-2x"></i>
                                  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>

</div>
@endsection