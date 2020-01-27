
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('ask') }}"><button type="button" class="btn-outline-primary btn-lg float-right">Ask Question</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="">This is just a test</a>
                        <hr>
                        <a href="">This is just a test</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
