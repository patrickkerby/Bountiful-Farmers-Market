 {{--
  Template Name: Events
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
  <div class="row full-width justify-content-center sponsors">
    <div class="col-sm-10">
      <h4>Our sponsors make our great programming possible!</h4>
      @while ( have_rows('sponsor','option') )

        @php the_row();
          $sponsor_logo = get_sub_field('sponsor_logo', 'option');
          var_dump($sponsor_logo);
        @endphp 

        <img src="{{ $sponsor_logo }}" alt="Thanks to our sponsors!" />

      @endwhile
      
    </div>
  </div>
@endsection
