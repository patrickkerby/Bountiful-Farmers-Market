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


 <!-- Modal -->
 <div class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="vendorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h2>Find out more about becoming a vendor!</h2>
          <p>Be one of the first to join us in setting the new standard for Edmonton farmers’ markets! We are currently accepting Vendor Application submissions. Learn more about our year-round multi-day market by downloading:</p>
          <p><a target="_blank" href="https://bountifulmarkets.com/VendorBooklet_2019.pdf">Vendor Booklet</a></p>
          <p><a target="_blank" href="https://bountifulmarkets.com/2019-Vendor-Application.pdf">Vendor Application Form</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<section class="fancy-list row overlap-{{ $overlap }} justify-content-center">
  <div class="col-10">
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
      <li><img data-src="{{ $icon }}" class="lazyload" />{{ $text }}</li>
    @php
        endwhile;
    @endphp

    </ul>

      @php endif;
   
      if( $link ): 

    @endphp  
      <a href="#" class="button" data-toggle="modal" data-target="#vendorModal">Apply to be a vendor</a>
      {{-- <a class="button" href="{{ $link_url }}" target="{{ $link_target }}">{{ $link_title }}</a> --}}
  
    @php endif; @endphp

  </div>
</section>