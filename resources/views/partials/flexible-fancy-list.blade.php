@php
  $title = get_sub_field('title');
  $button = get_sub_field('button');
  $overlap = get_sub_field('overlap');
@endphp



<section class="fancy-list row overlap-{{ $overlap }}">
  <div class="col-md-10">
    <h4>{{ $title }}</h4>
    @php

      if( have_rows('list_item') ):
    
        while ( have_rows('list_item') ) : the_row();
    
          $icon = get_sub_field('icon');
          $text = get_sub_field('text');
    
    @endphp 
      <li><img src="{{ $icon }}" />{{ $text }}</li>
    @php

    
        endwhile;
    
      endif;
    
    @endphp  
  </div>
</section>