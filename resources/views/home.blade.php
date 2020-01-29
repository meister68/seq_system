
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
                        <a href="{{ route('seeBody',$Post->id) }}"><h6>{{ $Post['title'] }}</h6 ></a>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
