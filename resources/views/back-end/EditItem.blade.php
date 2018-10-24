@extends('back-end.layout.master')
@section('title')
  Edit Item
@endsection
@section('content')
  <section class="column is-8">
    <form class="" action="{{url('/admin/update-item/'.$item->id)}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Short Description</label>
        <div class="control">
          <input class="input" type="text" name="short_desciption" placeholder="Short Description" value="{!!$item->short_desciption!!}">
        </div>
      </div>

      <div class="field">
        <label class="label">Long Description</label>
        <div class="control">
          <textarea class="textarea" name="long_description" placeholder="Long Description">
            {!!$item->long_description!!}
          </textarea>
        </div>
      </div>
      <div class="field">
        <figure class="image is-64*64">
          @php
          $image_path = preg_replace('/.\//','',$item->image_file,1);
          @endphp
          <img id="listImage" src="{{asset($image_path)}}">
        </figure>
        <div class="file">
          <label class="file-label">
            <input class="file-input" type="file" name="image_file">
            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">
                Change Image…
              </span>
            </span>
          </label>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Start Date</label>
          <div class="control">
            <input class="input" type="date" name="start_date" placeholder="Start Date" value="{{$item->start_date}}">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">End Date</label>
          <div class="control">
            <input class="input" type="date" name="end_date" placeholder="End Date" value="{{$item->end_date}}">
            <input class="input" type="datetime" name="end_date_time" placeholder="End Date time" value="{{$item->end_date_time}}">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Price</label>
          <div class="control">
            <input class="input" type="number" name="price" placeholder="Set a price" value="{{$item->price}}">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="select">
          <select name="is_featured">
            <option value="0">Make Featured Item</option>
            <option value="1">yes</option>
            <option value="0">no</option>
          </select>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Current Bid</label>
          <div class="control">
            <input class="input" type="number" name="current_bid" placeholder="Cuttent Bid" value="{{$item->current_bid}}">
          </div>
        </div>
        <div class="control">
          <input type="submit" class="button is-primary" value="Update Data">
        </div>
      </div>
    </form>
  </section>
@endsection
