@extends('base1')

@section('content')

<div class="container-fluid" style="background-color: rgb(205, 247, 181); padding-bottom: 10px;">

  <div class="col-md-12">
    <h1 class="pt-2 pb-2 name">Users</h1>
    <hr>
    @foreach($users as $u)
      @if ($u->gender == 'Male')
      <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightblue; border-radius: 1.5em">
      @else
    <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightpink; border-radius: 1.5em">
    @endif
      <div class="card-body">
      <h5 class="card-title"><i class='bx bxs-user' id="icons"></i> {{$u->name}}</h5>
      <a href="/authors/{{$u->id}}" class="btn d-flex justify-content-center"><i class="fa fa-eye" aria-hidden="true"></i> Show Posts </i></a>
      </div>
    </div>
    @endforeach

    </div>
    <br>
  </div>

@endsection

