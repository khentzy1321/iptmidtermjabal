@extends('base1')

@section('content')

<div class="container-fluid" style="background-color: rgb(61, 213, 255); padding-bottom: 10px;">

  <div class="col-md-12">
    <h1 class=" pt-2 pb-2 name">Post by {{$user->name}}</h1>
    <hr>
    <div class="row row-cols-1 row row-cols-md-2 g-1 d-flex justify-content-between">
      @foreach($posts as $p)
      <div class="card align-self-stretched"  style="width: 31%">
      @if ($p->user->gender == 'Male')
      <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightblue; border-radius: 1.5em">
      @else
      <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightpink; border-radius: 1.5em">
      @endif
        <div class="card-body">
          <div class="dropdown float-end">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{$p->category->category}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach(App\Models\User::whereHas('posts', function($query) use ($p){
                    $query->where('category_id', $p->category_id);
                    })->get() as $u)
                    <li><a class="dropdown-item" href="/authors/{{$u->id}}">{{$u->name}}</a></li>
                @endforeach
            </ul>
          </div>
          <h5 class="card-title pb-3"><i class='bx bxs-user' id="icons"></i> {{$p->user->name}}</h5>
          <p class="card-text bg-white p-3" style="border-radius: 10px;">{{$p->post}}</p>
        </div>
      </div>
     </div>
      @endforeach
  <br>
    </div>
    </div>

</div>

@endsection

