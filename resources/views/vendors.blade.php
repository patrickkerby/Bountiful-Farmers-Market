{{--
  Template Name: Vendors List
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="row justify-content-center">
      <div class="col-sm-7">
        @include('partials.content-page')
      </div>
      <div class="col-sm-3">
        <h2>Our vendors make our market our stand out!</h2>
        <p>We prioritize local vendors and believe in showcasing the best of our community while increasing the availability of local products.</p>
        <h3>More shopping hours</h3>
        <p>With more shopping hours than any other farmers' markets in Edmonton, we bring you greater access to local products, and create more opportunities for you to make meaningful connections with local producers and makers.</p>
        <h3>Become a vendor!</h3>
        <p>We’re always accepting applications for new vendors.</p>
        <p><a href="" class="download">Download Vendor Booklet</a></p>
        <p><a href="" class="download">Vendor Application Form</a></p>
      </div>
    </section>
  @endwhile
@endsection
