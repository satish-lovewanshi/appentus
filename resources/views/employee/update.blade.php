@extends('welcome') @section('mainData')
<h2>Edit employee Details Form</h2>
<form method="POST" action="{{ route('employee.update',['employee'=>$employee->id]) }}">
{{ method_field('PUT') }}
    @csrf
    <div class="form-group row">
        <label for="firstName" class="col-md-4 col-form-label text-md-right">Employee First Name</label>

        <div class="col-md-6">
            <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $employee->firstName }}" required autocomplete="firstName" autofocus> @error('firstName')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>

        <div class="col-md-6">
            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $employee->lastName }}" required autocomplete="lastName" autofocus> @error('lastName')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="company_id" class="col-md-4 col-form-label text-md-right">Company Name</label>

        <div class="col-md-6">
            <input id="company_id" type="text" class="form-control @error('company_id') is-invalid @enderror" name="company_id" value="{{ $employee->company_id }}" required autocomplete="company_id" autofocus> @error('company_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}" required autocomplete="email" autofocus> @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

        <div class="col-md-6">
            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $employee->phone }}" required autocomplete="phone" autofocus> 
            @error('phone')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Sava</button>
        </div>
    </div>
</form>

@endsection