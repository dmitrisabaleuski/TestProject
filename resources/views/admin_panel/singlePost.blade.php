@extends('layouts.adminPanel')

@section('admincontent')
    <header id="admin-header">
        <div class="admin-page-back-to-main"><a href="/adminPanel">Back to Admin Panle</a></div>
        <div class="admin-page-user"><a href="{{route('postsPage',['user_id'=>Auth::user()->id])}}">Back to Posts
                Page</a></div>
    </header>
    <div class="post-page-content">
        <div class="post">
            <h4>{{$post['title']}}</h4><br>
            <p>{{$post['description']}}</p><br>
            <data>{{$post['created_at']}}</data><br>
            <author>{{$post['name']}}</author>
        </div>
    </div>
@endsection
