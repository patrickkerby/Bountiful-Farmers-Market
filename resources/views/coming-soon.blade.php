{{--
  Template Name: Coming Soon
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div id="container3" class="gallery col-md-6 col-xs-12 order-xs-2 order-sm-2 order-md-1" style="height: 100vh; width: 100%; background: #E0E0E0; margin:auto;"></div>
    <div class="col-md-6 col-sm-12 order-xs-1 order-sm-1 order-md-2 words">
      <img src="@asset('images/bountiful-farmers-market.svg')" class="logo" alt="Alberta Bountiful Farmers' Market" />
      @include('partials.comingsoon-page')
    </div>
  @endwhile
@endsection
