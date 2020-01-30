
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
                    <form  action="{{ route('addPost') }}" method="POST">
              
                        @csrf
                        <div class="form-group">
                            <label for="comment"><h3 class="font-weight-bold">Title</h3></label><br>
                                <p>Be specific and imagine you are asking a question to another person</p>
                                <input type="text" class="form-control form-control-lg" name="title"><hr>
                            <label for="comment"><h3 class="font-weight-bold">Body</h3></label>
                                <p>Include all the information someone would need to answer your question</p>
                                <textarea class="form-control" rows="5" id="comment" name="description"></textarea> 
                                <input type="hidden" value="{{session('id')}}" name="user_id">    
                        </div>
                        <button type="submit" class="btn-outline-success btn-lg float-right">Post</button>
                    </form>
                      
                        
                        <a href="{{ route('home') }}"><button type="submit" class="btn-outline-danger btn-lg ">Cancel</button></a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
