@extends('layouts.app')


@section('content')
  <div class="container">
      <div class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="page-header">
                <h1>{{$book->title}} <br /><small>{{$book->author}}</small></h1>
              </div>
              <img src="/images/{{$book->path}}" class="img-responsive" alt="Responsive image">
              <p class="text-muted">Publication date: <small>{{$book->pub_date}}</small></p>
              <br />
              <div class="page-header">
                <h1><br /><small>Summary:</small></h1>
              </div>
              <div class="title"><p class="summary-copy">{{$book->summary}}</p></div>
              <br />
              <div class="row">
                <div class="col-md-12">
                  <a class="btn btn-primary" href="{{route('posts.edit', $book->id)}}">Edit</a>
                </div>
              </div>
              <br />
            </div>
          </div>
      </div>
  </div>
@stop
