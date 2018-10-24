@extends('layouts.app')
@section('title')
  {{ __('Login') }}
@endsection
@section('content')

  <section class="column is-half is-offset-one-quarter">
    <form class="" action="{{ route('login') }}" method="post" >
      @csrf
      <div class="field">
        <label class="label">{{ __('E-Mail Address') }}</label>
        <div class="control">
          <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" placeholder="{{ __('E-Mail Address') }}">
          @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <label class="label">{{ __('Password') }}</label>
        <div class="control">
          <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" placeholder="{{ __('Password') }}">
          @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
          </label>
        </div>
      </div>
      <div class="field">
        <a class="is-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
      </div>


      <div class="control">
        <input type="submit" class="button is-primary" value="Submit">

      </div>
    </div>
  </form>
</section>



@endsection
