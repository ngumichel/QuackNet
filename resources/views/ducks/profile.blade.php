@extends('layouts.app')
@section('title')
    {{ $duck->duckname }} Profile
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-dark">{{ $duck->duckname }}</div>

                    <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text"
                                       class="form-control" name="firstname"
                                       value="{{ $duck->firstname }}" readonly autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                       class="form-control" name="lastname"
                                       value="{{ $duck->lastname }}" readonly autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control" name="email"
                                       value="{{ $duck->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-primary mr-2" href="{{ route('ducks.edit') }}">
                                    Edit
                                </a>
                                <a class="btn btn-primary mr-2" href="{{ route('ducks.password') }}">
                                    Change password
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
