@extends('layouts.profile') 
@section('content-profile') @if (sizeof($brands)!=0)

<div class="container" style="width:100%">
    <div class="row">
        @foreach ($brands as $brand)

        <div class="col-sm-6">
            <div class="card" style="width: 14rem; margin: 5px;">
                <div class="container">
                    <div class="row ">
                        <div class="col col-md-4" style="padding-right:0px;;">
                            <img class="float-left card-img-top img-fluid mx-auto d-block" src="{{$brand->avatar}}" alt="Card image cap" style="position: absolute;padding-right: 0px;margin-top:10px;height:70px;width:70px;border-radius:50%; max-width:100%">
                        </div>
                        <div class="col col-md-6">
                            <h5 class="float-left card-title" style="margin-top:27.5%;margin-left:10px">{{$brand->name}}</h5>

                            <div class="card-body" class="float-left">
                                <a href="#" class="btn btn-primary">UnFollow</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@else

<p>You currently follow no brands</p>

@endif 

@stop