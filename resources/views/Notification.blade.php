@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<script type='text/javascript'>
    //Pusher.logToConsole = true;
    var pusher = new Pusher('59a1d10e99c58e2524f0',{ cluster: 'ap1' }, {
        encrypted: true
    });
    var channel = pusher.subscribe('test');
     //console.log(channel);
  

    

    var channel = pusher.subscribe('test');
    channel.bind('App\\Events\\CommentEvent', function(data) {
      alert(data);
    });
    

</script>
@endsection('content')