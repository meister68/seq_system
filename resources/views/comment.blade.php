
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
                
                    <!-- @foreach($seeBody as $Content) -->
                        <!-- sample sa pagkuha sa relationship -->
                          <!-- echo $seeBody->comment -->
                        <div class="form-group">
                            <label for="comment"><h5 class="font-weight-bold">Title</h5></label>
                                <p>{{ $seeBody[0]->title }}</p>
                            <label for="comment"><h6 class="font-weight-bold">Body</h6></label>
                                <p>{{ $seeBody[0]['description'] }}</p>  
                        </div>

                        <!-- dre pag butang og foreach sa comment -->
                    <!-- @endforeach -->
                  
                      
                        
                        <input  id="comment_box" type="text" value="your comment" />
                        <input  id="comment_submit" type="submit" value="Submit" />
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
