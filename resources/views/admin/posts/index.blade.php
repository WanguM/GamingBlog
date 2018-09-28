@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Post</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>body</th>
            <th>Createed</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->category? $post->category->name : 'Uncategorized' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ str_limit($post->body,10) }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach

        @endif
        </tbody>
    </table>

@stop
