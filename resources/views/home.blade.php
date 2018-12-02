@extends('layouts.home') 
@section('content-home')

<div class="container">
    <div class="card">
        <div class="card-body">My Feed</div>
    </div>

    @if (sizeof($posts)!=0) @foreach ($posts as $post)

    <div id="feed-container"  class="container">
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
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-end">
                                <div>
                                    <i class="fas fa-heart fa-sm" style="padding-left: 15px;"></i> 40
                                </div>
                                <a href="{{url('/channel/'.$post->hash)}}">
                                    <div> <i class="fas fa-comment fa-sm" style="padding-left: 15px;"></i> 40

                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach @else
    <p>No feed here, pal up with brands to fill up your feed</p>
    @endif

</div>



@stop