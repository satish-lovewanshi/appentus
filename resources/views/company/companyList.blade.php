@extends('welcome') @section('mainData') @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div class="card-header row">
    <h3>Company </h3>
    <a href="{{ route('company.create') }}" class="btn btn-success mx-auto">Add New Company</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $company)
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <td>{{ $company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->website}}</td>
                <td>
                    <form action="{{ route('company.destroy',['company'=>$company->id]) }}" method="POST">
                        {{ method_field('delete') }} @csrf
                        <button type="submit" class="btn  btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('company.edit',['company'=>$company->id]) }}" class="btn btn-success">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection