
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

<<<<<<< HEAD
                   <a href="">How to make a table in mysql</a> 
                   <hr>
                   <a href="">How to make a table in mysql</a>

=======
                    You are logged in!
                    {{$value}}
>>>>>>> fd6cf9befbe0bc99b82b6ddb2b7808d61182b69a
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
