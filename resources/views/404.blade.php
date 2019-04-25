@extends('layouts.app')

@section('content')

<section class="row justify-content-center">
  <div class="col-sm-8">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
  </div>
</section>
@endsection
