@php
    $image = get_sub_field('image');
    $alignment = get_sub_field('alignment');
    $background = get_sub_field('background');
@endphp

<section class="image-feature row {{ $alignment }} {{ $background }} justify-content-center">
    <div class="col-md-5">
      @php the_sub_field('content'); @endphp
    </div>
    <div class="col-md-5">

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

          <img src="{{ $thumb }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}" />

        @php if( $caption ): @endphp

            <p class="wp-caption-text">{{ $caption }}</p>

          </div>

        @php endif; 
        endif; @endphp
    </div>
</section>