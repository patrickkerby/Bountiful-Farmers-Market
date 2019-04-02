@php
$content = get_sub_field('content');
$is_sidebar = get_sub_field('sidebar_choice');
@endphp

<section class="intro-content row">
  <div class="col-md-6 offset-md-1">
    @php the_sub_field('content'); @endphp
  </div>
  
  @php if( have_rows('sidebar') ): @endphp
  <div class="sidebar col-md-4">
    <ul>
    @php while ( have_rows('sidebar') ) : the_row();
      $list_item = get_sub_field('list_item');
    @endphp 
      <li>{{ $list_item }}</li>
    @php
      endwhile; @endphp
    </ul>
  </div>
  @php endif; @endphp

</section>