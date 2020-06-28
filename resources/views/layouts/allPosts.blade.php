@extends('main')

@section('content')
    <div class="sort">
        <form method="POST" action="{{ route('sort') }}">
            <select name="sort_by" >
                {!! $sort !!}
            </select>
            <button type="submit" class="btn btn-default">Sort</button>
            {{csrf_field()}}
        </form>
    </div>
    <div class="post-page-content">
        @if (is_object($posts))
            @foreach($posts as $post)
                <div class="post">
                    <h4>{{$post['title']}}</h4><br>
                    <p class="short_desc">{{$post['description']}}</p><br>
                    <date>{{$post['created_at']}}</date><br>
                    <author>{{$post['name']}}</author><br>
                    <a href="{{route('showSinglePost',['post_id'=>$post['id']])}}">See More</a><br><br>
                </div>
            @endforeach
        @else
            {{$posts}}
        @endif
    </div>
@endsection
