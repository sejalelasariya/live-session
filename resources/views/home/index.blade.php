@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://brilliansolution.com" role="button">View more tutorials here &raquo;</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest

        <h2>Blogs</h2>
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->name }}</h2>
                <p>{{ $post->detail }}</p>
                
                <h2>Add Comment</h2>
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div>
                        <textarea name="content" rows="4" cols="50"></textarea>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection