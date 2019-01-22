<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJZ5W74"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    @php do_action('get_header') @endphp
    <div class="wrap" role="document">
      <div class="content">
        <main class="main row no-gutters">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
    <script>
          (function($){
            $(document).ready( function(){
                var instance = $('#container3').Chocolat({
                    loop: true,
                    images : [
                      <?php
                        if( have_rows('renderings') ):?>
                          <?php while ( have_rows('renderings') ) : the_row();  
                            $image = get_sub_field('image');
                          ?>
                        {src : '<?php echo $image; ?>'},                        
                        <?php endwhile; ?>
                        <?php else :
                        endif; ?>            
                      ],
                    imageSize : 'cover',
                    container : '#container3',
                    afterMarkup: function () {
                        console.log('afterMarkup hook is called')
                    },
                    afterImageLoad: function () {
                        console.log('afterImageLoad hook is called')
                    },
                    afterInitialize: function () {
                        console.log('afterInitialize hook is called')
                    },
                    zoomedPaddingX: function (imgWidth, canvasWidth) {
                        // add a padding around the zoomed image
                        // default to 0
                        return canvasWidth / 10;
                    },
                    zoomedPaddingY: function (imgHeight, canvasHeight) {
                        // add a padding around the zoomed image
                        // default to 0
                        return canvasHeight / 10;
                    }
                }).data('chocolat').api().open();
              })    
            })( jQuery );
        </script>
  </body>
</html>
