{{--
  Template Name: Home Page
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp

    @php    
      // This loop requires a /partials template that is named exactly the same as the layout title in ACF flexible content page builder

      $id = get_the_ID();
      
      if ( have_rows( 'page_builder', $id ) ) :
      
        // loop through the selected ACF layouts and display the matching partial
        while ( have_rows( 'page_builder', $id ) ) : the_row();
          $layout = get_row_layout();
    
        @endphp
      
          @include( "partials.{$layout}")
      
        @php
        endwhile;      
    
      elseif ( get_the_content() ) :
      
        // no layouts found
      
      endif;        
    @endphp

  @endwhile
  @include('partials.mailchimp')
@endsection
