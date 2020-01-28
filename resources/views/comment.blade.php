
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                <center><h4>Find your Answer in your Question</h4></center>
                </div>

                <div class="card-body">
    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($seeBody as $Content)
                        <div class="form-group">
                            <label for="comment"><h5 class="font-weight-bold">Title</h5></label>
                                <p>{{ $Content['title'] }}</p>
                            <label for="comment"><h6 class="font-weight-bold">Body</h6></label>
                                <p>{{ $Content['description'] }}</p>  
                        </div>
                    @endforeach
                    <!-- <input type="text" class="form-control form-control-lg" >
                        <button type="submit" class="btn-outline-success btn-lg float-right">Comment</button>
                  -->
                      
                        
                        <input  id="comment_box" type="text" value="your comment" />
                        <input  id="comment_submit" type="submit" value="Submit" />
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
