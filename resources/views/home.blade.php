@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    <button
                      class="btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#addModal"
                      type="button"
                      name="button">Add Bookmark</button>
                      <hr>
                      <h3>My Bookmarks</h3>
                      <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                          <li class="list-group-item clearfix">
                            <a href="{{$bookmark->url}}" target="_blank" class="float-start" style="position:absolute;top:30%">{{$bookmark->name}} </a>
                            <span class="pull-right button-group">
                              <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger float-end" name="button"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                            </span>
                          </li>
                        @endforeach
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addModallabel">Add Bookmark</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('store') }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Bookmark Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label>Bookmark URL</label>
                  <input type="text" class="form-control" name="url">
                </div>
                <div class="form-group">
                  <label>Website Description</label>
                  <textarea class="form-control" name="description"></textarea>
                </div>
                <input type="submit" name="submit" style="margin-top: 5px" value="Submit" class="btn btn-success">
              </form>
        </div>
      </div>
    </div>
  </div>

@endsection

