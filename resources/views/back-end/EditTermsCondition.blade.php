@extends('back-end.layout.master')
@section('title')
  Edit Terms and Condition
@endsection
@section('content')
  <section class="column is-8">
    @if (session('status'))
        <div class="notification is-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="" action="{{url('/admin/update-terms-condition/'.$item->id)}}" method="post" >
      {{ csrf_field() }}


      <div class="field">
        <label class="label">Edit Terms And Condition</label>
        <div class="control">
          <textarea class="textarea" id="terms_condition" name="terms_condition" placeholder="Long Description" value="">
            {{$item->terms_condition}}
          </textarea>
        </div>
      </div>
      <div class="field">
        <input type="submit" class="button is-primary" name="update_news" value="Update Data">
      </div>

    </form>
  </section>
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>
  CKEDITOR.replace( 'terms_condition' );

  </script>

@endsection
