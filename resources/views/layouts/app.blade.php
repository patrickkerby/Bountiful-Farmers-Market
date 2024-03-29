<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJZ5W74"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    @php do_action('get_header') @endphp
    
    @if ( is_page('events') )
      {{-- do nothin' --}}
    @else
      @include('partials.header')
    @endif
    <div class="wrap" role="document">
      <div class="content">
        <main class="main container-fluid">
          @if (is_woocommerce())
            <div class="row justify-content-center ">
              <div class="col-sm-11 woocontent">
                @yield('content')
              </div>
            </div>
          @else
            @yield('content')
          @endif

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
  </body>
</html>
