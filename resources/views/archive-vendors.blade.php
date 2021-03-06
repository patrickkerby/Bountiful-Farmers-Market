@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <h1>TEST TEST TEST</h1>
  <section class="row justify-content-center">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    <div class="col-sm-7">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  
    <div class="col-sm-3">
      <h2>Our vendors make our market our stand out!</h2>
      <p>We prioritize local vendors and believe in showcasing the best of our community while increasing the availability of local products.</p>
      <h3>More shopping hours</h3>
      <p>With more shopping hours than any other farmers' markets in Edmonton, we bring you greater access to local products, and create more opportunities for you to make meaningful connections with local producers and makers.</p>
      <h3>Become a vendor!</h3>
      <p>We’re always accepting applications for new vendors.</p>
      <p><a href="https://bountifulmarkets.com/2019-Vendor-Application.pdf" target="_blank" class="download">Vendor Application Form</a></p>
    </div>
  </section>

  {!! get_the_posts_navigation() !!}

  @include('partials.sponsors')

@endsection
