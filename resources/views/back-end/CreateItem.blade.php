@extends('back-end.layout.master')
@section('title')
  Create Item
@endsection
@section('content')
  <section class="column is-10">
    <form class="" action="{{url('/admin/save-item')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Short Description</label>
        <div class="control">
          <input class="input {{ $errors->has('short_desciption') ? ' is-danger' : '' }}" type="text" name="short_desciption" placeholder="Short Description">
        </div>
        @if ($errors->has('short_desciption'))
          <p class="help is-danger">{{ $errors->first('short_desciption') }}</p>
        @endif
      </div>

      <div class="field">
        <label class="label">Long Description</label>
        <div class="control">
          <textarea class="textarea {{ $errors->has('long_description') ? ' is-danger' : '' }}" name="long_description" id="long_description" placeholder="Long Description"></textarea>
          @if ($errors->has('long_description'))
            <p class="help is-danger">{{ $errors->first('long_description') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <div class="file">
          <label class="file-label">
            <input class="file-input {{ $errors->has('image_file') ? ' is-danger' : '' }}" type="file" name="image_file">
            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">
                Upload a Image…
              </span>
            </span>
          </label>
        </div>
        @if ($errors->has('image_file'))
          <p class="help is-danger">{{ $errors->first('image_file') }}</p>
        @endif
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Start Date</label>
          <div class="control">
            <input class="input {{ $errors->has('start_date') ? ' is-danger' : '' }}" type="date" name="start_date" placeholder="Start Date">
          </div>
          @if ($errors->has('start_date'))
            <p class="help is-danger">{{ $errors->first('start_date') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">End Date</label>
          <div class="control">
            <input class="input {{ $errors->has('end_date') ? ' is-danger' : '' }}" type="date" name="end_date" placeholder="End Date">
            <input class="input {{ $errors->has('end_date_time') ? ' is-danger' : '' }}" type="datetime" name="end_date_time" placeholder="End Date time">
          </div>
          @if ($errors->has('end_date'))
            <p class="help is-danger">{{ $errors->first('end_date') }}</p>
          @endif
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Price</label>
          <div class="control">
            <input class="input {{ $errors->has('price') ? ' is-danger' : '' }}" type="number" name="price" placeholder="Set a price">
          </div>
          @if ($errors->has('price'))
            <p class="help is-danger">{{ $errors->first('price') }}</p>
          @endif
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
            <input class="input {{ $errors->has('current_bid') ? ' is-danger' : '' }}" type="number" name="current_bid" placeholder="Cuttent Bid">
          </div>
          @if ($errors->has('current_bid'))
            <p class="help is-danger">{{ $errors->first('current_bid') }}</p>
          @endif
        </div>
        <div class="control">
          <input type="submit" class="button is-primary" value="Submit">
        </div>
      </div>
    </form>
  </section>
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>
  CKEDITOR.replace( 'long_description' );
		</script>
@endsection
