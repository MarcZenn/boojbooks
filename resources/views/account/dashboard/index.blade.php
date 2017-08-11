@extends('layouts.app')


@section('content')

<section class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="page-header">
      <h1>{{$user->name}}'s <br /><small>Book List</small></h1>
    </div>

    @if(count($books) > 0)
      <div class="row">
        <div class="form-group col-sm-12 col-md-6">
          <label>Filter Author</label>
          <select id="author-filter" class="form-control">
            <option>All</option>
            @foreach($books->unique('author') as $book)
              <option>{{$book->author}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-sm-12 col-md-6">
            {!! Form::open(['method'=>"POST", 'action'=>'SortController@sortTitle']) !!}
              {{csrf_field()}}
              <div class="form-group col-sm-12 col-md-10">
                <input class="hidden" type="number" name="id" placeholder="id" value="{{$user->id}}"/>
                {!! Form::label('title', 'Search Titles Only:') !!}
                {!! Form::text('title',null,['class'=>'form-control'])!!}
              </div>
              @if($back)
                <div style="padding: 25px 0;" class="form-group col-sm-12 col-md-2">
                  <a class="btn btn-primary" href="/dashboard/{{Auth::user()->id}}">Back</a>
                </div>
               @else
                <div style="padding: 25px 0;" class="form-group col-sm-12 col-md-2">
                  {!! Form::submit('Search', ['class'=>'btn btn-default'])!!}
                </div>
              @endif

            {!! Form::close() !!}
        </div>
      </div>
    @endif


    @if(count($books) > 0)
      <div class="row">
        @foreach($books as $book)
          <div data-author="{{$book->author}}" class="dragdrop book-tile col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="/images/{{$book->path}}" alt="book">
              <div class="caption">
                <h3>{{str_limit($book->title, 20)}}</h3>
                <p>{{$book->author}}</p>
                <p class="text-muted">Publication date: <small>{{$book->pub_date}}</small></p>
                <p>{{ str_limit($book->summary , 150)}}</p>
                <br />
                <div class="row">
                  <div class="col-sm-12 col-md-4">
                    <p><a href="{{route('posts.show', $book->id)}}" class="btn btn-primary" role="button">See Details</a></p>
                  </div>
                  <div class="col-md-4">
                    <a class="btn btn-info" href="{{route('posts.edit', $book->id)}}">Edit</a>
                  </div>
                  <!-- Trigger modal to verify deletion of 'this' book -->
                  <div class="col-sm-12 col-md-4">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#{{$book->id}}">Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div id="{{$book->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Whoa!</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{$book->title}}?</p>
                </div>
                <div class="modal-footer">
                  {!! Form::model($book, ['method'=>'DELETE', 'action'=>['BooksController@destroy', $book->id]]) !!}
                    {{csrf_field()}}
                    {!! Form::submit('Delete', ['class'=>'modal-footer btn btn-default'])!!}
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <br />
      <p>You Haven't Added Any Books Yet...</p>
      <br />
    @endif

    <div class="page-header">
      <h1>Add Book <br /><small>Completed Books Only</small></h1>
    </div>

    {!! Form::open(['method'=>"POST", 'action'=>'BooksController@store', 'files'=> true]) !!}
      {{csrf_field()}}
      <input class="hidden" type="number" name="id" placeholder="id" value="{{$user->id}}"/>
      <div class="form-group">
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
        {!! Form::label('image', 'Upload a Cover Photo:') !!}
        {!! Form::file('image', ['class'=>'form-control'])!!}
        <br />
        {!! Form::submit('Add Book', ['class'=>'btn btn-primary'])!!}
      </div>
    {!! Form::close() !!}


    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
</section>
@stop
