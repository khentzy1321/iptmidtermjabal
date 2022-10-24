<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use App\Events\UserLog;
class Delete extends Component
{
    public $emploId;

    public function getEmployeeProperty(){
        return Employee::select('id','name', 'address', 'contact')
        ->find($this->emploId);

    }
    public function deleteEmployee(){
        $this->employee->delete();

        $log_entry = 'Deleted an Employee" ' .$this->employee->name . 'With the ID# ' .$this->employee->id;
        event(new UserLog($log_entry));


        return redirect('/index')->with('message', 'Deleted Successfully!');


    }
    public function render()
    {
        return view('livewire.employees.delete');
    }
}
