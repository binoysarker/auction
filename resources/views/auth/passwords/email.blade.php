@extends('layouts.app')

@section('content')
  <section class="column is-half is-offset-one-quarter">
    <div class="card">

        <div class="card-content">
            @if (session('status'))
                <div class="notification is-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                  <label class="label">{{ __('E-Mail Address') }}</label>
                  <div class="control">
                    <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                      <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                  </div>
                </div>

                <div class="control">
                  <input type="submit" class="button is-primary" value="{{ __('Send Password Reset Link') }}">

                </div>
            </form>
        </div>
    </div>
  </section>

@endsection
