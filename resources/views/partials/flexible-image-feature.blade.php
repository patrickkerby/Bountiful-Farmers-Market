@php
    $image = get_sub_field('image');
    $alignment = get_sub_field('alignment');
    $background = get_sub_field('background');
@endphp

<section class="intro-content row {{ $alignment }} {{ $background }}">
    <div class="col-md-6">
      @php the_sub_field('content'); @endphp
    </div>
    <div class="col-md-6">

      @php 

        if( !empty($image) ): 

        // vars
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        // thumbnail
        $size = 'large';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];

        if( $caption ): 
        @endphp

          <div class="wp-caption">

        @php endif; @endphp

        <a href="{{ $url }}" title="{{ $title }}">

          <img src="{{ $thumb }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}" />

        </a>

        @php if( $caption ): @endphp

            <p class="wp-caption-text">{{ $caption }}</p>

          </div>

        @php endif; 
        endif; @endphp
    </div>
</section>