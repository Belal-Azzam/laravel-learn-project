@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>
    <div class="row">
        <div class="col-sm-4">
            <img class="img-responsive img-circle" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/200x200' }}"/>
        </div>
        <div class="col-sm-8">
        {!! Form::model($post, [ 'method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true ]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', ['' => 'Choose Categories' ] +  $categories, null ,['class' => 'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id',['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body', null ,['class' => 'form-control' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class' => 'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::close() !!}
        </div>
        {!! Form::open([ 'method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id ], 'class' => 'pull-right col-sm-6' ]) !!}

            <div class="form-group">
            {!! Form::submit('Delete Post', ['class' => 'btn btn-danger ']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    </div>
    <div class="row">
        @include('includes.form_error')

    </div>
@endsection