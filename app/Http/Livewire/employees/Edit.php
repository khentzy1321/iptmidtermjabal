<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use App\Events\UserLog;
class Edit extends Component

{
    public $emploId;
    public $name, $address, $contact, $year, $degree;

    public function mount(){
        $this->name = $this->employee->name;
        $this->address = $this->employee->address;
        $this->contact = $this->employee->contact;
        $this->degree = $this->employee->degree;
        $this->year = $this->employee->year;

    }

    public function editEmployee(){
        $this->validate([
            'name'              =>            ['required' ,'string', 'max:255'],
            'address'           =>            ['required' ,'string', 'max:255'],
            'contact'           =>            ['required' ,'string', 'max:255'],
            'degree'            =>            ['required' ,'string', 'max:255'],
            'year'                =>            ['required' ,'numeric','min:1' ,'max:4'],
        ]);
        $this->employee->update([
            'name'        =>        $this->name,
            'address'        =>        $this->address,
            'contact'        =>        $this->contact,
            'degree'        =>        $this->degree,
            'year'        =>        $this->year,
        ]);

        $log_entry = 'Updated an Employee" ' .$this->name . 'With the ID# ' .$this->employee->id;
        event(new UserLog($log_entry));


        return redirect('/index')->with('message' , 'Updated SucessFully');
    }


    public function getEmployeeProperty(){
        return Employee::find($this->emploId);
    }


    public function render()
    {
        return view('livewire.employees.edit');
    }
}
