@extends('layouts.app')


@section('content')

<section class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="page-header">
      <h1>Edit<br /><small>{{$book->title}} </small></h1>
    </div>
    <div>
      {!! Form::model($book, ['method'=>'PATCH', 'action'=>['BooksController@update', $book->id], 'files'=> true]) !!}
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
        <br />
        {!! Form::label('author', 'Author:') !!}
        {!! Form::text('author',null,['class'=>'form-control'])!!}
        <br />
        {!! Form::label('summary', 'Summary:') !!}
        {!! Form::text('summary',null,['class'=>'form-control'])!!}
        <br />
        {!! Form::label('pub_date', 'Publication Date:') !!}
        {!! Form::date('pub_date',null,['class'=>'form-control'])!!}
        <br />
        {!! Form::label('image', 'Change Photo:') !!}
        {!! Form::file('image', ['class'=>'form-control'])!!}
        <br />
        {!! Form::submit('Update Book', ['class'=>'btn btn-primary'])!!}

      {!! Form::close() !!}
    </div>
  </div>
</section>


@stop
