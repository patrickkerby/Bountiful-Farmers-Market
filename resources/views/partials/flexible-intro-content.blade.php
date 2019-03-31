@php
$content = get_sub_field('content');
@endphp

<section class="intro-content row">
  <div class="col-md-10">
    @php the_sub_field('content'); @endphp
  </div>
</section>