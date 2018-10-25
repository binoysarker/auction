@extends('layouts.app')
@section('title')
  {{ __('Register') }}
@endsection
@section('content')
  <section class="column is-half is-offset-one-quarter">
    <form class="" action="{{ route('register') }}" method="post" >
      @csrf
      <div class="field">
        <label class="label">{{ __('Name') }}</label>
        <div class="control">
          <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" placeholder="{{ __('Name') }}">
          @if ($errors->has('name'))
            <p class="help is-danger">{{ $errors->first('name') }}</p>
          @endif
        </div>
      </div>
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
          <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" id="password" type="password" name="password" placeholder="{{ __('Password') }}">
          @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <label class="label">{{ __('Confirm Password') }}</label>
        <div class="control">
          <input class="input" type="password" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">

        </div>
      </div>
      <div class="field">
        <article class="message is-primary ">
          <div class="message-header">
            <p>Terms And Condition</p>
          </div>
          <div class="message-body customMessage">
            {!!$termsCondition->terms_condition!!}
          </div>
        </article>

      </div>
      <div class="control">
        <input type="submit" class="button is-primary" value="Register">

      </div>
    </div>
  </form>
</section>

<style media="screen">
.customMessage{
  height: 200px;
  overflow: scroll;
}
</style>

@endsection
