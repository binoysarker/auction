@extends('back-end.layout.master')
@section('title')
  All Bilboard Message
@endsection
@section('content')
  <section>
    @if (session('status'))
        <div class="notification is-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table is-striped is-hoverable">
      <thead class="thead">
        <tr>
          <th>Serial No</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @isset($bilboardMessage)
          @foreach ($bilboardMessage as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>
                <p class="is-small">
                  {!! substr($item->bilboard_message,0,500).'...' !!}
                </p>
              </td>
              <td>
                <a href="{{url('/admin/edit-bilboard-message/'.$item->id)}}" class="button is-info is-small">
                  <i class="fas fa-edit">Edit</i>
                </a>
                <form class="" action="{{url('/admin/delete-bilboard-message/'.$item->id)}}" method="post">
                  {{ csrf_field() }}
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
