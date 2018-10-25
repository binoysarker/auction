@extends('back-end.layout.master')
@section('title')
  Create Bilboard Message
@endsection
@section('content')
  <section class="column is-10">
    <form class="" action="{{url('/admin/save-bilboard-message')}}" method="post">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Create Bilboard Message</label>
        <div class="control">
          <textarea class="textarea {{ $errors->has('bilboard_message') ? ' is-danger' : '' }}" id="bilboard_message" name="bilboard_message" placeholder="Create Bilboard Message"></textarea>
          @if ($errors->has('bilboard_message'))
            <p class="help is-danger">{{ $errors->first('bilboard_message') }}</p>
          @endif
        </div>
        <div class="field">
          <input type="submit" class="button is-info" name="submit" value="Save Data">
        </div>
      </div>

    </form>


  </section>
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>
  CKEDITOR.replace( 'bilboard_message' );
  </script>
@endsection
