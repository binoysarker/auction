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
          <input class="input" type="text" name="short_desciption" placeholder="Short Description">
        </div>
      </div>

      <div class="field">
        <label class="label">Long Description</label>
        <div class="control">
          <textarea class="textarea" name="long_description" id="long_description" placeholder="Long Description"></textarea>
        </div>
      </div>
      <div class="field">
        <div class="file">
          <label class="file-label">
            <input class="file-input" type="file" name="image_file">
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
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Start Date</label>
          <div class="control">
            <input class="input" type="date" name="start_date" placeholder="Start Date">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">End Date</label>
          <div class="control">
            <input class="input" type="date" name="end_date" placeholder="End Date">
            <input class="input" type="datetime" name="end_date_time" placeholder="End Date time">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Price</label>
          <div class="control">
            <input class="input" type="number" name="price" placeholder="Set a price">
          </div>
        </div>
      </div>
      <div class="field">
        <div class="select">
          <select name="is_featured">
            <option>Make Featured Item</option>
            <option value="1">yes</option>
            <option value="0">no</option>
          </select>
        </div>
      </div>
      <div class="field">
        <div class="field">
          <label class="label">Current Bid</label>
          <div class="control">
            <input class="input" type="number" name="current_bid" placeholder="Cuttent Bid">
          </div>
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
