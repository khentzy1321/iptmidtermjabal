
<div>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center text-white">Add Employee</h3>
        </div>
        <div class="backg">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" wire:model.defer="name">
                <label for="name">Name</label>
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" wire:model.defer="address">
                <label for="address">Address</label>
                @error('address')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" wire:model.defer="contact">
                <label for="contact">Contact</label>
                @error('contact')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-floating mb-3">
                <select name="degree" class="form-select" wire:model.defer="degree">
                    <option hidden="true">Degree .</option>
                    <option selected disabled>Select Degree</option>
                    <option value="CAST">College of Art Science and Technology</option>
                    <option value="COE">College of Education</option>
                    <option value="CCJ">College of Criminal Justice</option>
                    <option value="CABM">College of Accountancy Business Management</option>
                </select>
                <label for="degree">Department</label>
                @error('degree')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-floating mb-3">
                <select name="year" class="form-select" wire:model.defer="year">
                    <option hidden="true">Year</option>
                    <option selected disabled>Year</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
                <label for="year">Year Level</label>
                @error('year')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group mb-3 grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-primary" type="submit" wire:click="addEmployee()">
                    Add Employee
                </button>
            </div>
            </div>
        </div>
    </div>
</div>
<style>
    .backg{
        background-image:url('{{asset('/images/bg.jpg')}}');
    }
    .card-header{
        background-image:url('{{asset('/images/bg3.jpg')}}');
    }
</style>
