<section class="slider row no-gutters justify-content-center">
  @php 
    $slides = get_sub_field('slide');
  @endphp

  @if( $slides )
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach( $slides as $slide )
          <li data-target="#carouselIndicators" data-slide-to="{{ $loop->index }}" class="@if ($loop->first)active @endif"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach( $slides as $item )
          <div class="carousel-item row no-gutters justify-content-center {{ $item['colour_scheme'] }} {{ $item['alignment'] }} @if ($loop->first)active @endif">	
            <div class="col-sm-6";>
              <img src="{{ $item['image']['url'] }}" alt="{{ $item['title'] }}" />  
            </div>
            <div class="col-sm-6">                
              <h3>{{ $item['title'] }}</h3>
              <h4>{{ $item['subtitle'] }}</h4>
              {!! $item['content'] !!}
            </div>
          </div> 
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  @endif
</section>
