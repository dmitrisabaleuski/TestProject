@extends('main')

@section('content')
    <header id="admin-header">
        <div class="admin-page-back-to-main"><a href="/">Back to Main Page</a></div>
    </header>
    <div class="post-page-content">
        <div class="post">
            @if ($post != null)
                <h4>{{$post['title']}}</h4><br>
                <p>{{$post['description']}}</p><br>
                <data>{{$post['created_at']}}</data><br>
                <author>{{$post['name']}}</author>
            @else
                <p>Post doesn't exist!</p>
            @endif
        </div>
    </div>
@endsection
