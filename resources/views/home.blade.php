@extends('layouts.app')
@section('title','Home')
@section('content')

<!-- errot information -->
@include('shared.errors')

<!-- set album, pop up button -->
<button type="button" class="btn btn-primary" style="margin-bottom:10px" data-toggle="modal" data-target="#createAlbum">
    Create album
</button>

<!-- create album: pop-up box-->
<div class="modal fade" id="createAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Album</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="{{ route('albums.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Album name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">Album introduction</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" name="intro">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- album display -->
<!-- album display section code -->

<div class="row">
    @each('shared.album', $albums, 'album')
</div>



@endsection
