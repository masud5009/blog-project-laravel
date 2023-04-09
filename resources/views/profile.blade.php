@extends('layouts.account')
@section('content')
    <div class="container">
        <div class="register-logo">
            <a href="{{ route('index') }}" class="text-black h2 mb-0">M <span class="text-danger">-Educate</span></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notice') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('For now you can comment and explore other post click.')}} <a href="{{ route('index') }}">here</a>
                        <br>
                        {{ __('If you want to post your content. Wait a few minutes to active your account from admin that verify you.') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
