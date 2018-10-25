@extends('back-end.layout.master')
@section('title')
  Edit News Item
@endsection
@section('content')
  <section class="column is-8">
    <form class="" action="{{url('/admin/update-news-item/'.$item->id)}}" method="post" >
      {{ csrf_field() }}


      <div class="field">
        <label class="label">New Text</label>
        <div class="control">
          <textarea class="textarea" id="news_text" name="news_text" placeholder="Long Description" value="">
            {{$item->news_text}}
          </textarea>
        </div>
      </div>
      <div class="field">
        <input type="submit" class="button is-primary" name="update_news" value="Update News">
      </div>

    </form>
  </section>

@endsection
