
<div>
    <div class="container">
        <div class="row">
          <div class="col">
                <select class="form-select" wire:model.debounce.1000ms="degree">
                    <option value="all">All</option>
                    <option value="CAST">College of Art Science and Technology</option>
                    <option value="COE">College of Education</option>
                    <option value="CCJ">College of Criminal Justice</option>
                    <option value="CABM">College of Accountancy Business Management</option>
                </select>
          </div>
          <div class="col">
                    <select class="form-select" wire:model.debounce.1000ms="year">
                                <option value="all">All</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                     </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="search" wire:model.debounce.1000ms="search">
                </div>
          </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Department</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $emplo)
                <tr>
                    <th>{{$emplo->id}}</th>
                    <th>{{$emplo->name}}</th>
                    <th>{{$emplo->address}}</th>
                    <th>{{$emplo->contact}}</th>
                    <th>{{$emplo->degree}}</th>
                    <th>{{$emplo->year}}</th>
                    <td >
                        <a href="{{url('edit', ['employers' => $emplo->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                    <td >
                        <a href="{{url('delete', ['employers' => $emplo->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>

<style>
    body {
  background-size: cover;
  background-image:url('{{asset('/images/bg1.jpg')}}');
}
</style>
