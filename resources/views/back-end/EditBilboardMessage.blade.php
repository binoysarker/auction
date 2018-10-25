@extends('back-end.layout.master')
@section('title')
  Edit Bilboard Message
@endsection
@section('content')
  <section class="column is-8">
    <form class="" action="{{url('/admin/update-bilboard-message/'.$item->id)}}" method="post" >
      {{ csrf_field() }}


      <div class="field">
        <label class="label">Bilboard Message</label>
        <div class="control">
          <textarea class="textarea" id="bilboard_message" name="bilboard_message" placeholder="Long Description" value="">
            {!!$item->bilboard_message!!}
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
  CKEDITOR.replace( 'bilboard_message' );
  </script>
@endsection
