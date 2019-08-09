@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="row justify-content-center">
      <div class="col-sm-10 intro">
          <h3>{{ $intro }}</h3>
      </div>
      <div class="col-10 col-md-5">             
        {!! $content !!}
      </div>
      <div class="col-md-5">
        <div class="gallery grid-layout">
          @forelse($photo_gallery as $image)
            <a href="{{$image->url}}" class="image grid-item slick" target="_blank" style="background-image: url('{{$image->url}}');"></a>
          @empty
            <p class="alert alert-danger">No Images</p>
          @endforelse
        </div>
      </div>
    </section>
    <section class="row justify-content-center facts">
      <div class="col-sm-10 col-md-6">
        <h4>Did you know?</h4>
        @forelse($vendor_facts as $vendor_fact)
          <blockquote>{{ $vendor_fact->fact }}</blockquote>
        @empty
        @endforelse
      </div>
    </section>
    <section class="row justify-content-center products-list">
      <h4>Products at Market</h4>
      <div class="col-sm-8 col-md-10">
        <ul>
          @forelse($vendor_products as $vendor_product)
            <li>{{ $vendor_product->product }}</li>
          @empty
            <li class="alert alert-danger">No Products</li>
          @endforelse
        </ul>
      </div>
    </section>
    <section class="row no-gutters justify-content-center vendors-nav post-nav">
      <div class="previous-icon col-md-1 order-md-1 d-none d-md-flex"></div>
      <div class="previous col-sm-5 col-md-4 order-md-1"><h5>Read about</h5> <?php previous_post_link( '%link', '%title' ); ?></div>
      <div class="index col-4 col-md-2 order-last order-md-3"><a href="../">See all Vendors</a></div>
      <div class="next col-sm-5 col-md-4 order-md-4"><h5>Read about</h5> <?php next_post_link( '%link', '%title' ); ?></div>
      <div class="next-icon col-md-1 order-md-5 d-none d-md-flex"></div>
    </section>

  @endwhile
@endsection
