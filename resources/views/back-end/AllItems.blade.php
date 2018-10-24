@extends('back-end.layout.master')
@section('title')
  All Auction Items
@endsection
@section('content')
  <section>
    <table class="table table is-striped is-hoverable">
      <thead class="thead">
        <tr>
          <th>Loat No</th>
          <th>Description</th>
          <th>Current Bid</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($auction_items as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>
              <figure class="image is-64*64">
                @php
                  $image_path = preg_replace('/.\//','',$item->image_file,1);
                @endphp
                <img id="listImage" src="{{url('/public/'.$image_path)}}">
              </figure>
              <p class="is-small">
                {{substr($item->short_desciption,0,70)}}
              </p>
            </td>
            <td><strong>{{"$".$item->current_bid}}</strong></td>
            <td>
              <a href="{{url('/admin/auction_item/'.$item->id.'/edit')}}" class="button is-info is-small">
                <i class="fas fa-edit">Edit</i>
              </a>
              <form class="" action="{{url('/admin/auction_item/'.$item->id.'/delete')}}" method="post">
                <input type="submit" name="delete" class="button is-danger is-small" value="Delete">
              </form>
            </td>
          </tr>

        @endforeach

      </tbody>
    </table>
  </section>
@endsection
