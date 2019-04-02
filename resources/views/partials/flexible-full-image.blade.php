@php
  $image = get_sub_field('image');
  $button = get_sub_field('button');
  $overlay = get_sub_field('overlay');
@endphp

<section class="full-image row justify-content-center" style="background-image: linear-gradient({{ $overlay }}, {{ $overlay }}), url('{{ $image }}');">
  <div class="col-md-8">
    @php the_sub_field('content'); @endphp
  </div>
</section>