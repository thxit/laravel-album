@extends('layouts.app')
@section('title','Home')
@section('content')

<!-- errot information -->
@include('shared.errors')

<!-- set album, pop up button -->
<button type="button" class="btn btn-primary" style="margin-bottom:10px">Create album</button>

<!-- album display -->
<!-- album display section code -->

<div class="row">
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
</div>

<img class="img-responsive" src="/img/albumm/covers/default.jpg">

@endsection
