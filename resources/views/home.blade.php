
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('ask') }}"><button type="button" class="btn-primary btn-lg float-right">Ask Question</button></a></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($post as $Post)
                    <hr>
                    
                        <a href="{{ route('seeBody',$Post->id) }}"><h3>{{ $Post['title'] }}</h3></a>
                        @if(Auth::id() == $Post->user_id)
                            <div class="dropdown">
                                <button id="dropdown" class="btn btn-outline-secondary dropdown-toggle float-right" type="button" data-toggle="dropdown">
                                </button>
                                <ul class="dropdown-menu">
                                <a href="{{ route('editPost',['id' => $Post->id])}}"><button id="edit" class="btn btn-primary">Edit</button></a>
                                <a href="{{ route('deletePost',$Post->id)}}"><button id="delete" class="btn btn-danger">Delete</button></a>
                                </ul> 
                            </div>
                            <hr>
                        @endif  
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
