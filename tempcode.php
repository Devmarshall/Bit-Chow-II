<div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!
                </div>


 {!! Form::open(['action'=>'PostsController@create', 'method'=>'POST', 'files' => true]) !!}
                                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                {!! Form::close() !!}
