
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
                             <div class="form-group " id='comments'>
                             <p><strong>{{$test->user->name}}</strong></p>
                                <p>{{$test->body}}</p>
                            </div>   
                        @endforeach                    
                </div>
            </div>
            <br>

            <form action="{{ route('addComment') }}" method="POST">
            @csrf 
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="d-flex">
                                <input type="hidden" value="{{$seeBody[0]->id}}" name="post_id"> 
                                <input class="form-control mr-1" name="body">
                                <button class="btn btn-secondary">Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


 <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> 

<script>
     var pusher = new Pusher('59a1d10e99c58e2524f0',
    {
        cluster: 'ap1',
        encrypted: true
    });

    function test(data) 
    {
       
        let comment = `<div> <p><strong>${data.username}</strong></p> <p>${data.body}</p></div>`
        $('#comments').append(comment);
        
    }

    function test2(data){
        let count = parseInt( $('#notifCount').text())
        count+=1
        $('#notifCount').text(count)
        console.log('test event')
    }

   
    //notif for user
    var channel = pusher.subscribe('user'+user_id);
    channel.bind('App\\Events\\CommentEvent',test2)
    var channel2 = pusher.subscribe('post'+post_id);
    channel2.bind('App\\Events\\NotificationEvent',test)
    //channel.bind('App\\Events\\CommentEvent', test2)
    //test2();

</script>

@endsection
