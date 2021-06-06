@extends('welcome')

@section('mainData')

<div class="card-header row">
    <h3>Compay </h3>
    <a href="{{ route('company.create') }}" class="btn btn-success mx-auto">Add New Company</a>
</div>

@endsection