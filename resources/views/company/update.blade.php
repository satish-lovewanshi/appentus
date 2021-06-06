@extends('welcome') @section('mainData')
<h2>Edit Company Details Form</h2>
<form method="POST" action="{{ route('company.update',['company'=>$company->id]) }}">
{{ method_field('PUT') }}
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}" required autocomplete="name" autofocus> @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->email }}" required autocomplete="email" autofocus> @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>

        <div class="col-md-6">
            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ $company->logo }}" required autocomplete="logo" autofocus> 
            @error('logo')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="website" class="col-md-4 col-form-label text-md-right">website</label>

        <div class="col-md-6">
            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $company->website }}" required autocomplete="website" autofocus> @error('website')
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