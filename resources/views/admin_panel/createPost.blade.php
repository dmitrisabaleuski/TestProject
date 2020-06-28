@extends('layouts.adminPanel')

@section('admincontent')
    <header id="admin-header">
        <div class="admin-page-back-to-main"><a href="/adminPanel">Back to Admin Panle</a></div>
        <div class="admin-page-title"><h1>{{$pageName}}</h1></div>
        <div class="admin-page-user"><a href="{{route('postsPage',['user_id'=>Auth::user()->id])}}">Back to Posts
                Page</a></div>
    </header>

    <div class="post">
        <div class="post-content">
            <form id="createPost" method="POST" action="{{ route('savePost') }}">
                <ul>
                    <li>
                        <p>Title: </p>
                        <input type="text" required placeholder="Enter post title" name="title"
                               value="Title">
                    </li>
                    <li>
                        <p>Description: </p>
                        <textarea rows="10" cols="100" placeholder="Enter post description" name="description"
                                  value="Description"></textarea>
                    </li>
                    <input type="text" name="author_id" hidden value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-default">Save</button>
                    {{csrf_field()}}
                </ul>
            </form>
        </div>
    </div>
@endsection
