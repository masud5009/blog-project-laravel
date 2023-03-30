@extends('layouts.account')
@section('content')
    <div class="container">
        <div class="register-logo">
            <a href="{{ route('index') }}" class="text-black h2 mb-0">M <span class="text-danger">-Educate</span></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Wait a few minutes to active your account from admin') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
