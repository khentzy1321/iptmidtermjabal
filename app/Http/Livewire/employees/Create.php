<?php

namespace App\Http\Livewire\employees;

use Livewire\Component;
use App\Models\Employee;
use App\Events\UserLog;

class Create extends Component
{
    public $name, $address, $contact, $degree, $year, $email;

    public function addEmployee(){
        $this->validate([
            'name'              =>            ['required' ,'string', 'max:255'],
            'address'           =>            ['required' ,'string', 'max:255'],
            'contact'           =>            ['required' ,'string', 'max:255'],
            'degree'    =>            ['required' ,'string', 'max:255'],
            'year'                =>            ['required' ,'numeric','min:1' ,'max:4'],
        ]);

      $employee =   Employee::create([
            'name'                =>        $this->name,
            'address'             =>        $this->address,
            'contact'             =>        $this->contact,
            'degree'      =>        $this->degree,
            'year'                  =>        $this->year,
        ]);

        $log_entry = 'Added a Employee" ' . $employee->name . ' " with the ID# of' . $employee->id;

        event(new UserLog($log_entry));

        return redirect('/index')->with('message', 'Added Successfully!!');
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
