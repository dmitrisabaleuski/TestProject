@extends('layouts.adminPanel')

@section('admincontent')
    <header id="admin-header">
        <div class="admin-page-back-to-main"><a href="/">Back to Main</a></div>
        <div class="admin-page-title"><h1>{{$pageName}}</h1></div>
        <div class="admin-page-user">Hello {{ Auth::user()->name }}</div>
    </header>
    <div class="content">
        <nav>
            <ul>
                <li>
                    <a href="{{route('postsPage',['user_id'=>Auth::user()->id])}}">Posts Page</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
