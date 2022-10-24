<div>
    <div class="container col-md-6 offset-md-3 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center text-white">Delete Employee??</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td class="text-white">{{$this->employee->name}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td class="text-white">{{$this->employee->address}}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td class="text-white"> {{$this->employee->contact}}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer ">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger btn-sm" wire:click="deleteEmployee()">
                        delete
                    </button>
                    <button class="btn btn-success btn-sm mx-2"  >
                        back
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
  background-size: cover;
  background-image:url('{{asset('/images/bg.jpg')}}');
}
.card{
    background-image:url('{{asset('/images/bg3.jpg')}}');
}
</style>
