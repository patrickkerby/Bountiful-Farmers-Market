@php
$content = get_sub_field('content');
$is_sidebar = get_sub_field('sidebar_choice');
@endphp

<section class="intro-content row">
  {{-- @if( have_rows('sidebar') ) --}}
    <div class="col-sm-8 col-md-6 offset-md-1">
      @php the_sub_field('content'); @endphp
    </div>
    <div class="sidebar col-sm-4 col-lg-3 offset-lg-1">
      <ul>
      @while ( have_rows('sidebar') )
      @php the_row();
        $list_item = get_sub_field('list_item');
      @endphp 
        <li>{{ $list_item }}</li>
      @endwhile
      </ul>
    </div>
  {{-- @else 
    <div class="col-sm-8 col-md-8 offset-md-2">
      @php the_sub_field('content'); @endphp
    </div>
  @endif --}}

</section>