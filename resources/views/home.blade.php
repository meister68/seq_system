
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
                    @if (!$post)
                    <!-- kulang og no results -->
                       <h3>No results Found</h3>
                    @else
                        @foreach($post as $Post)
                            <hr>
                            <a href="{{ route('seeBody',$Post->id) }}"><h6>{{ $Post['title'] }}</h6 ></a>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      console.log(user_id)
     var pusher = new Pusher('59a1d10e99c58e2524f0',
    {
        cluster: 'ap1',
        encrypted: true
    });
    
    var channel = pusher.subscribe('post'+post_id);
    channel.bind('App\\Events\\CommentEvent',addComment)

    var channel2 = pusher.subscribe('user'+user_id);
    channel2.bind('App\\Events\\NotificationEvent',sendNotification)

    function addComment(data) 
    {
        console.log(data)
        console.log(user_id)
        let comment = `<div> <p><strong>${data.username}</strong></p> <p>${data.body}</p></div>`
        $('#comments').append(comment);
    }

    function sendNotification(data){
        console.log('noti')
        let count = parseInt( $('#notifCount').text())
        count+=1
        $('#notifCount').text(count)
        //console.log('test noti event')
    }

   

    
    

</script>

@endsection
