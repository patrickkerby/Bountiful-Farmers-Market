@php
  $image = get_sub_field('image');
  $button = get_sub_field('button');
  $overlay = get_sub_field('overlay');
@endphp

<section class="full-image row" style="background-image: linear-gradient({{ $overlay }}, {{ $overlay }}), url('{{ $image }}');">
  <div class="col-md-6">
    @php the_sub_field('content'); @endphp
  </div>
</section>