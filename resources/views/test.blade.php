@extends('layouts.app')
@section('content')
<div class="card notification" style="width: 25rem;">

    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-primary head"><strong>Notifications</strong></li>
        <div class="message ">
            @foreach($posts as $post)
                 @foreach($post->comment as $comment)
                    @if($comment->status == 0)
                            <li class="list-group-item list-group-item-secondary"><a
                            href="{{route('seeBody', $post->id)}}"><strong><span>{{$comment->user->name}}</span></strong>
                            commented on your posts </a> <span class='timestamps'>{{ $comment->created_at->format('d-m-Y') }}</span></li>
                    @else
                        <li class="list-group-item "> <a
                        href="{{route('seeBody', $post->id)}}"><strong><span>{{$comment->user->name}}</span></strong>
                        commented on your post</a><span class='timestamps'>{{ $comment->created_at->format('d-m-Y') }}</span></li>
                    @endif
                @endforeach 
            @endforeach
        </div>

    </ul>
    
    <br><button class="btn-danger" type="button">Clear Notification</button>
   


</div>




@endsection('content')