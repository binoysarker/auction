@extends('front-end.layout.master-front')
@section('title')
  Home
@endsection
@section('content')
  <div class="columns">
    <div class="column is-9 pr0">
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
                    <img id="" src="{{url('/public/'.$image_path)}}">
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
    </section>
  </div>
  <div class="column is-3 pl0">
    <section class="box">
      <h1 class="title">Featured Items</h1>
      @foreach ($auction_items as $item)
        @if ($item->is_featured == 1)
          <a href="{{url('/item-detail/'.$item->id)}}">
            <article class="media">
              <figure class="media-left">
                <p class="image is-64x64">
                  @php
                  $image_path = preg_replace('/.\//','',$item->image_file,1);
                  @endphp
                  <img id="" src="{{url('/public/'.$image_path)}}">
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
              <div class="media-right">

              </div>
            </article>

          </a>
        @endif
      @endforeach
      </section>
    </div>
  </div>


@endsection
