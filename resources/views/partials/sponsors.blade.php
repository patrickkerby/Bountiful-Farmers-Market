@if (have_rows('sponsor','option'))
<div class="row full-width justify-content-center sponsors">
  <div class="col-sm-10">
    <h4>Our sponsors make our great programming possible!</h4>
    @while ( have_rows('sponsor','option') )

      @php the_row();
        $sponsor_logo = get_sub_field('sponsor_logo', 'option');
      @endphp 

      <img src="{{ $sponsor_logo }}" alt="Thanks to our sponsors!" />

    @endwhile
  </div>
  @endif