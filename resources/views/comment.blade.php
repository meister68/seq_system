
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <center><h4>Ask a Question</h4></center>
                </div>

                <div class="card-body">
    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($seeBody as $Content)
                        <div class="form-group">
                            <label for="comment"><h3 class="font-weight-bold">Title</h3></label><br>
                                <h3>{{ $Content['title'] }}</h3>
                            <label for="comment"><h3 class="font-weight-bold">Body</h3></label>
                                <h4>{{ $Content['description'] }}</h4>  
                        </div>
                    @endforeach
                        <button type="submit" class="btn-outline-success btn-lg float-right">Post</button>
                 
                      
                        
                        <a href="{{ route('home') }}"><button type="submit" class="btn-outline-danger btn-lg ">Cancel</button></a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
