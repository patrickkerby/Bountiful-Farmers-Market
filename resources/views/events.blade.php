 {{--
  Template Name: Events
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
  @include('partials.sponsors')

@endsection
