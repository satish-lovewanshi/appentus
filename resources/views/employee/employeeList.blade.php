@extends('welcome') @section('mainData') @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div class="card-header row">
    <h3>Employee </h3>
    <a href="{{ route('employee.create') }}" class="btn btn-success mx-auto">Add New employee</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $employee)
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <td>{{ $employee->firstName}}</td>
                <td>{{ $employee->lastName}}</td>
                <td>{{ $employee->company_id}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                
                <td>
                    <form action="{{ route('employee.destroy',['employee'=>$employee->id]) }}" method="POST">
                        {{ method_field('delete') }} @csrf
                        <button type="submit" class="btn  btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('employee.edit',['employee'=>$employee->id]) }}" class="btn btn-success">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection