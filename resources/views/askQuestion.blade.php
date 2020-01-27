
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><button type="button" class="btn-outline-primary btn-lg float-right">Ask Question</button></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="comment"><h3 class="font-weight-bold">Title</h3></label><br>
                            <p>Be specific and imagine you are asking a question to another person</p>
                            <input type="text" class="form-control form-control-lg"><hr>
                        <label for="comment"><h3 class="font-weight-bold">Body</h3></label>
                            <p>Include all the information someone would need to answer your question</p>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                           
                    </div>
                        <button type="submit" class="btn-outline-success btn-lg float-right">Post</button>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
