@extends('front-end.layout.master-front')
@section('title')
  Item Detail
@endsection
@section('content')
  <div class="columns">
    <div class="column is-9">
      <section>
        <div class="card">
          @if (session('success'))
            <article class="message is-info">
              <div class="message-header">
                <p>Success</p>

              </div>
              <div class="message-body">
                {{session('success')}}
              </div>
            </article>
          @endif
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
                  @guest
                    Lot Number: {{$item->id}}
                    <br>
                    Current Bid: {{"$".$item->current_bid}}
                    <br>
                    History: {{$totalBids}} bids
                    <br>
                  @else
                    Lot Number: {{$item->id}}
                    <br>
                    Current Bid: {{"$".$item->current_bid}}
                    <br>
                    History: {{$totalBids}} bids
                    <br>
                    Your Maximum Bid: $0.0
                    <br>
                    @php
                      if ($item->current_bid >= 5 &&  $item->current_bid < 100) {
                        $shoCurrentBid = $item->current_bid + 2;
                      }
                      elseif ($item->current_bid >= 100 &&  $item->current_bid <= 1000) {
                        $shoCurrentBid = $item->current_bid + 10;
                      }
                    @endphp
                    Next Bid: {{"$".$shoCurrentBid}} or more
                    <br>
                    <form class="" action="{{route('start-bid')}}" method="post">
                      {{ csrf_field() }}
                      My Maximum bid: <input type="number" name="bid_price" value="">
                      <input type="hidden" name="auction_item_id" value="{{$item->id}}">
                      <input type="submit" class="button is-danger is-small" name="submit" value="Place Bid">
                    </form>

                    @if (session('status'))
                      <div class="notification is-danger">
                        {{ session('status') }}
                      </div>
                    @endif
                  @endguest

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
