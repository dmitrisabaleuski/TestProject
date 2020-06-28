@extends('layouts.adminPanel')

@section('admincontent')
    <header id="admin-header">
        <div class="admin-page-back-to-main"><a href="/adminPanel">Back to Admin Panle</a></div>
        <div class="admin-page-title"><h1>{{$pageName}}</h1></div>
        <div><a href="/adminPanel/post/create">Create Post</a></div>
    </header>
    <div class="post-page-content">
        @if (is_object($posts))
            @foreach($posts as $post)
                <div class="post">
                    <h4>{{$post['title']}}</h4>
                    <p class="short_desc">{{$post['description']}}</p>
                    <date>{{$post['created_at']}}</date>
                    <author>{{$post['name']}}</author>
                    <a href="{{route('showPost',['post_id'=>$post['id']])}}">See More</a>
                </div>
            @endforeach
        @else
            {{$posts}}
        @endif
    </div>
@endsection
