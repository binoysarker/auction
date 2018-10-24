@extends('front-end.layout.master-front')
@section('title')
  Item Detail
@endsection
@section('content')
  <div class="columns">
    <div class="column is-9">
      <section>
        <div class="card">
          <div class="card-image">
            <figure class="image is-64*64">
              @php
              $image_path = preg_replace('/.\//','',$item->image_file,1);
              @endphp
              <img id="showImage" src="{{asset($image_path)}}">
            </figure>
            <div class="card-content">


              <div class="content">
                <address class="">
                  Lot Number: {{$item->id}}
                  <br>
                  Current Bid: {{"$".$item->current_bid}}
                  <br>
                  Your Maximum Bid: $0.0
                  <br>
                  History: 12 bids
                  <br>
                  Next Bid: {{"$".$item->current_bid}} or more
                  <br>
                  <form class="" action="index.html" method="post">
                    My Maximum bid: <input type="text" name="my_max_bid" value="">
                    <input type="submit" class="button is-danger is-small" name="submit" value="Place Bid">
                  </form>
                </address>
                <h1 class="subtitle">{{$item->short_desciption}}</h1>
                <p>
                  {!!$item->long_description!!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="column is-3">

    </div>
  </div>
@endsection
