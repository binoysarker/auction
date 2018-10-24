@extends('back-end.layout.master')
@section('title')
  All Auction Items
@endsection
@section('content')
  <section>
    <table class="table table is-striped is-hoverable">
      <thead class="thead">
        <tr>
          <th>Serial No</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @isset($all_news)
          @foreach ($all_news as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>
                <p class="is-small">
                  {!! substr($item->news_text,0,200).'...' !!}
                </p>
              </td>
              <td>
                <a href="{{url('/admin/news_item/'.$item->id.'/edit')}}" class="button is-info is-small">
                  <i class="fas fa-edit">Edit</i>
                </a>
                <form class="" action="{{url('/admin/news_item/'.$item->id.'/delete')}}" method="post">
                  <input type="submit" name="delete" class="button is-danger is-small" value="Delete">
                </form>
              </td>
            </tr>

          @endforeach
        @endisset

      </tbody>
    </table>
  </section>
@endsection
