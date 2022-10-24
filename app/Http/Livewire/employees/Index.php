<?php

namespace App\Http\Livewire\employees;

use Livewire\Component;
use App\Models\Employee;

class Index extends Component
{
    protected  $paginationTheme = 'bootstrap';

    public $search, $degree= 'all', $year = 'all';

    public function loadEmployee(){

        $query = Employee::orderBy('name')
        ->search($this->search);

        if($this->degree != 'all'){

            $query->where('degree', $this->degree);
        }
        if($this->year != 'all'){

            $query->where('year', $this->year);
        }

        $employees = $query->paginate(5);

        return compact('employees');
    }
    public function render()
    {
        return view('livewire.employees.index', $this->loadEmployee());
    }
}
