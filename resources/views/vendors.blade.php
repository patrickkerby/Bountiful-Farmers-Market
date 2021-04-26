{{--
  Template Name: Vendors List
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="row justify-content-center">
      <div class="col-sm-7">
        {{-- @foreach($vendor_loop as $vendor_item)
          {!! $vendor_item['title'] !!}          
        @endforeach --}}
        @include('partials.content-page')
      </div>
      <div class="col-sm-3">
        @include('partials.sidebar')
              </div>
    </section>
  @endwhile
  @include('partials.sponsors')

@endsection
