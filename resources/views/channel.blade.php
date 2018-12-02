@extends('layouts.home') 
@section('content-home')


<div class="container-fluid" style="margin-top: 10px;">
    <div class="card text-white bg-dark">
        @if ($post->img !== NULL)

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <img src={{$post->img}} style="width: 70%; height:auto;">
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex justify-content-start">
                            <p>{{$post->text}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <p>{{$post->text}}</p>
            </div>
        </div>
        @endif
        <div class="card-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        {{$post->brand_name}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 10px;">
        @foreach ($comments as $comment )
        <div class="card" style="margin-bottom: 3px;">
            <div class="card-body">
                <b>@{{$comment->user_handle}}: </b> {{$comment->text}}
            </div>
        </div>
        @endforeach
    </div>

</div>







@stop