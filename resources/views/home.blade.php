@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="page-header">
            <h1>Current Leaderboard <br /><small>Most Books Read</small></h1>
          </div>
          <div class="list-group">
            <a href="#" class="list-group-item disabled">
              Top 3 Readers Win A Trip to 5 of the Worlds Greatest Libraries
            </a>
            @if(count($users) > 0)
              @foreach($users as $user)
                <a href="#" class="list-group-item">{{$user->name}}</a>
              @endforeach
            @else
              <br />
              <p>Leaderboard is empty..</p>
              <br />
            @endif
          </div>
          <p><a href="/dashboard/{{Auth::user()->id}}" class="btn btn-primary" role="button">Go To Dashboard</a></p>
        </div>
    </div>
</div>
@endsection
