@extends('layouts.app')
@section('content')
<div class="card notification" style="width: 25rem;">

    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-primary head"><strong>Notifications</strong></li>
        <!-- <p>{{$post[0]->comment}}</p> -->
        @foreach($post[0]->comment as $comment)
        @if($comment->status == 0)
        <li class="list-group-item list-group-item-secondary"> <a
                href="{{route('seeBody', $post[0]->id)}}"><strong><span>{{$comment->user->name}}</span></strong>
                commented on your post</a></li>
        @else
        <li class="list-group-item "> <a
                href="{{route('seeBody', $post[0]->id)}}"><strong><span>{{$comment->user->name}}</span></strong>
                commented on your post</a></li>
        @endif
        @endforeach

    </ul>

</div>




@endsection('content')