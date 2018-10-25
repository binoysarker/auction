@extends('front-end.layout.master-front')
@section('title')
  Home
@endsection
@section('content')
  <div class="columns">
    <div class="column is-9 pr0">
      <section class="hero is-primary customHero">
        <div class="hero-body">
          <div class="content">
            <h1 class="title">
              Great News
            </h1>
            @isset($bilboardMessage)
              <h2 class="subtitle">
                {!!$bilboardMessage->bilboard_message!!}
              </h2>
            @endisset
          </div>
        </div>
      </section>
      <section class="box">
        <div class="columns is-multiline">
          @foreach ($auction_items as $item)
            <div class="column is-one-quarter-desktop is-half-tablet">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-3by2">
                    @php
                    $image_path = preg_replace('/.\//','',$item->image_file,1);
                    @endphp
                    <img id="" src="{{asset($image_path)}}">
                  </figure>
                  {{-- <div class="card-content is-overlay is-clipped">
                </div> --}}
                <span class="tag is-info">
                  {{substr($item->short_desciption,0,30).'...'}}
                </span>
              </div>
              <footer class="card-footer">
                <a class="card-footer-item button is-info" href="{{url('/item-detail/'.$item->id)}}" >Detail
                </a>
              </footer>
            </div>
          </div>
        @endforeach

      </div>
      <div class="column is-2 is-offset-3">
        <div class="box">
          {{$auction_items->links()}}
        </div>
      </div>
    </section>
  </div>
  <div class="column is-3 pl0 ">
    <section class="box ">
      <div class="customHeight">
        <h1 class="title changeMargin">Featured Items</h1>
        @foreach ($auction_items_featured as $item)
          <a href="{{url('/item-detail/'.$item->id)}}">
            <article class="media">
              <figure class="media-left">
                <p class="image is-64x64">
                  @php
                  $image_path = preg_replace('/.\//','',$item->image_file,1);
                  @endphp
                  <img id="" src="{{asset($image_path)}}">
                </p>
              </figure>
              <div class="media-content">
                <div class="content">
                  <p>
                    <span class="tag is-info">
                      {{substr($item->short_desciption,0,20).'...'}}
                    </span>
                  </p>
                </div>

              </div>

            </article>
          </a>
        @endforeach

      </div>

    </section>
  </div>
</div>


@endsection
