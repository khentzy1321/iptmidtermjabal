@extends('base1')

@section('content')

<div class="container-fluid" style="background-color: #C8E6C9">

        <div class="col-md-12" id="dashboard">
            <div class="float-end mt-4">
                <a href="#" data-toggle="modal" data-target="#postModal" class="btn btn-primary">
                <i class="fas fa-money-check-edit"></i> New Post
                </a>
    @include('posts.newpost')


</div>
            <h1 class="pt-2 pb-2">Recent Post</h1>
            <hr>
            <div class="container">


            <div class="card-body">
                @foreach($posts as $p)
                @if ($p->user->gender == 'Male')
                <div title="male" class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightblue; border-radius: 1.5em">
                @else
                <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightpink; border-radius: 1.5em">
                @endif
                    <div class="card-body">
                    <div class="dropdown float-end">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> {{$p->category->category}}
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
                @endforeach
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
