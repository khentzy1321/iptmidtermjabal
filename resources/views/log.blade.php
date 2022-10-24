@extends('base1')

@section('content')

<div class="p-5">
    <div class="d-grid gap-2 d-md-flex">
        <h1> Activity Log</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <th> Time Stamps</th>
            <th>Log Entry</th>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{$log->created_at}}</td>
                <td>{{$log->log_entry}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
