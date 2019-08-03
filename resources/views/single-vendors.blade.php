@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
 @debug
    <section class="row justify-content-center">
      <div class="col-sm-10 intro">
          <h3>{{ $intro }}</h3>
      </div>
      <div class="col-sm-5">             
        {!! $content !!}
      </div>
      <div class="col-sm-5">
        <div class="gallery grid-layout">
          @forelse($photo_gallery as $image)
            <a href="{{$image->url}}" class="image grid-item" target="_blank" style="background-image: url('{{$image->url}}');"></a>
          @empty
            <p class="alert alert-danger">No Images</p>
          @endforelse
        </div>
      </div>
    </section>
    <section class="row justify-content-center">
      <div class="col-sm-6 facts">
        <h4>Did you know?</h4>
        @forelse($vendor_facts as $vendor_fact)
          <blockquote>{{ $vendor_fact->fact }}</blockquote>
        @empty
        @endforelse
      </div>
    </section>
    <section class="row justify-content-center">
      <div class="col-sm-12">
        <h4>Products at Bountiful Farmers' Market</h4>
        <ul>
          @forelse($vendor_products as $vendor_product)
            <li>{{ $vendor_product->product }}</li>
          @empty
            <li class="alert alert-danger">No Products</li>
          @endforelse
        </ul>
      </div>
    </section>

    <footer>
      <nav class="post-nav">
        <ul class="pager">
          <li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
          <li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
        </ul>
      </nav>
    </footer>

  @endwhile
@endsection
