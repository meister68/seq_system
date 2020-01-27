
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

                   <a href="">How to make a table in mysql</a> 
                   <hr>
                   <a href="">How to make a table in mysql</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
