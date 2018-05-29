@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>


    <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'UnCategoriezed'}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/200x200'}}"/> </td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}" >{{$post->title}} </a> </td>
            <td>{{str_limit($post->body,10)}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>

    @endsection