@extends('back-end.layout.master')
@section('title')
  Create News
@endsection
@section('content')
  <section class="column is-10">
    <form class="" action="{{url('/admin/save-news')}}" method="post">
      <div class="field">
        <label class="label">Create News</label>
        <div class="control">
          <textarea class="textarea" id="news_text" name="news_text" placeholder="Long Description"></textarea>
        </div>
        <div class="field">
          <input type="submit" class="button is-info" name="submit" value="Save Data">
        </div>
      </div>

    </form>


  </section>
@endsection
