 {{--
  Template Name: Events
--}}
@php
$sponsor_logo = get_field('sponsor_logo', 'option'); 
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
  <div class="row full-width justify-content-center sponsors">
    <div class="col-sm-10">
      
      @while ( have_rows('sponsor','option') )

        @php the_row();
          $sponsor_logo = get_sub_field('sponsor_logo', 'option');
        @endphp 

        <img src="{{ $sponsor_logo }}" alt="Thanks to our sponsors!" />

      @endwhile
      
    </div>
  </div>
@endsection
