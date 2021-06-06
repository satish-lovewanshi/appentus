@extends('layouts.app') @section('content')
<h1 class='text-center'>Appentus</h1>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <a href="{{ route('company.index') }}" class="btn btn-success mr-2">Company</a>
                    <a href="" class="btn btn-success mr-2">Employee</a>
                </div>

                <div class="card-body">
                    @yield('mainData')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection