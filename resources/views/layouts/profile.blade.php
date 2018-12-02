@extends('layouts.app') 
@section('content')
<div class="container">

    <div class="card text-center">
        <div class="card-header">

            <div class="row justify-content-center">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/my/main') }}">Me</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/my/posts') }}">My Posts</a>
                    </li> --}}
                    {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/my/followers') }}">Followers</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/my/following') }}">Following</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/my/brands') }}">My Brands</a>
                    </li>

                </ul>
            </div>

        </div>
        <div class="card-body">
            {{--
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> --}} @yield('content-profile')

        </div>
    </div>
</div>
</div>
@endsection