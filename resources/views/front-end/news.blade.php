@extends('front-end.layout.master-front')
@section('title')
  News
@endsection
@section('content')
  <div class="columns">
    <div class="column is-9">
      <section>
        <div class="card">

          <div class="card-content">


            <div class="content">
              <div class="columns is-multiline">
                @foreach ($all_news as $item)
                  <div class="column is-full">
                    <div class="card">
                      <div class="card-content">
                        <div class="content">
                          <p>
                              {!!$item->news_text!!}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach
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
