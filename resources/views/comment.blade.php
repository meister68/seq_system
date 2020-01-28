
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                <center><h4>Find your Answer in your Question</h4></center>
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
                      

                        <!-- dre pag butang og foreach sa comment -->
                        @foreach ($seeBody[0]->comment as $test)
                             <div class="form-group">
                             <p><strong>{{$test->body}}</strong></p>
                                <p>{{$test->user->name}}</p>
                            </div>   
                        @endforeach                    
                </div>
            </div>
            <br>
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="d-flex">
                                <input class="form-control mr-1">
                                <button class="btn btn-secondary">Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
