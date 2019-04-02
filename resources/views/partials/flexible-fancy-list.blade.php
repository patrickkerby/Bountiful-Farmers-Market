@php
  $title = get_sub_field('title');
  $button = get_sub_field('button');
  $overlap = get_sub_field('overlap');

  $link = get_sub_field('button');

  if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
  endif;

@endphp



<section class="fancy-list row overlap-{{ $overlap }} justify-content-center">
  <div class="col-md-10">
    <h4>{{ $title }}</h4>
    @php

      if( have_rows('list_item') ):
    @endphp
    <ul>
    @php
        while ( have_rows('list_item') ) : the_row();
    
          $icon = get_sub_field('icon');
          $text = get_sub_field('text');
    
    @endphp 
      <li><img src="{{ $icon }}" />{{ $text }}</li>
    @php
        endwhile;
    @endphp

    </ul>

      @php endif;
   
      if( $link ): 

    @endphp  

      <a class="button" href="{{ $link_url }}" target="{{ $link_target }}">{{ $link_title }}</a>
  
    @php endif; @endphp

  </div>
</section>