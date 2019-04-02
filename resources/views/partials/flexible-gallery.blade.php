<section class="gallery row no-gutters">
  <div class="grid-layout col-md-12">
    @php 

      $images = get_sub_field('gallery');
      
      if( $images ): @endphp
              @php foreach( $images as $image ): @endphp
                  <div class="grid-item image">
                      <a href="@php echo $image['url']; @endphp" target="_blank" style="background-image: url('@php echo $image['sizes']['large']; @endphp');"></a>
                  </div>
              @php endforeach; @endphp
      @php endif;		
    @endphp
  </div>  
</section>