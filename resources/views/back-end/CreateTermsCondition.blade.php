@extends('back-end.layout.master')
@section('title')
  Create Terms and Condition
@endsection
@section('content')
  <section class="column is-10">
    @if (session('status'))
        <div class="notification is-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="" action="{{url('/admin/save-terms-condition')}}" method="post">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Create Terms Condition</label>
        <div class="control">
          <textarea class="textarea {{ $errors->has('terms_condition') ? ' is-danger' : '' }}" id="terms_condition" name="terms_condition" placeholder="Long Description"></textarea>
          @if ($errors->has('terms_condition'))
            <p class="help is-danger">{{ $errors->first('terms_condition') }}</p>
          @endif
        </div>
        <div class="field">
          <input type="submit" class="button is-info" name="submit" value="Save Data">
        </div>
      </div>

    </form>
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'terms_condition' );

    </script>

  </section>
@endsection
