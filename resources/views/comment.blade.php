@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <center>
                        <h4>Find your Answer in your Question</h4>
                    </center>
                </div>

                <div class="card-body card example-1 scrollbar-ripe-malinka">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <p class="font-weight-bold">{{ $seeBody[0]->title }}</p>
                        <p>{{ $seeBody[0]['description'] }}</p>
                        <hr>
                    </div>


                    @foreach ($seeBody[0]->comment as $test)
                    @if(Auth::id()==$test->user->id)
                    <div id="boxComment1">
                        <div class="form-group">
                            <strong class="float-right text-justify">{{$test->user->name}}</strong>
                            <p id="userBody" class="text-justify">{{$test->body}}</p>
                        </div>
                    </div>
                    @else
                    <div id="boxComment2">
                        <div class="form-group">
                            <strong class="float-left text-justify">{{$test->user->name}}</strong>
                            <p id="nonUserBody" class="text-justify">{{$test->body}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
            <br>

            <form action="{{ route('addComment') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body1">
                        <div class="container">
                            <div class="d-flex">
                                <input type="hidden" value="{{$seeBody[0]->id}}" name="post_id">
                                <input type="text" class="form-control mr-1" name="body">
                                <button class="btn btn-secondary">Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

