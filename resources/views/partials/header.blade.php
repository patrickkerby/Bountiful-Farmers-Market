@php 
  $hero = get_field('background_image');
  $overlay = get_field('overlay');	
  $logo = get_field('logo');
  $logo_choice = get_field('logo_choice');
  $sub_title = get_field('sub_title');
  $url = home_url();

@endphp

<nav class="nav-mobile">

    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif

</nav>
@if($acf_options->announcement)<div class="sitewide-announcement">{!! $acf_options->announcement !!}</div>@endif
<header class="container-fluid @if($acf_options->announcement) announcement @endif">
 
  <svg class="ribbon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 14" preserveAspectRatio="none"><g fill="none"><polygon points="0 14 120 14 120 0 0 0" fill="#D57974"/><polygon points="119 14 239 14 239 0 119 0" fill="#E9725D"/><polygon points="238 14 358 14 358 0 238 0" fill="#F4885D"/><polygon points="359 14 479 14 479 0 359 0" fill="#FFE686"/><polygon points="479 14 599 14 599 0 479 0" fill="#92BC5C"/><polygon points="599 14 719 14 719 0 599 0" fill="#264443"/><polygon points="719 14 840 14 840 0 719 0" fill="#007276"/><polygon points="839 14 959 14 959 0 839 0" fill="#354760"/><polygon points="959 14 1079 14 1079 0 959 0" fill="#0F1221"/><polygon points="1079 14 1204 14 1204 0 1079 0" fill="#21275C"/><polygon points="1200 14 1320 14 1320 0 1200 0" fill="#8E1821"/><polygon points="1320 14 1440 14 1440 0 1320 0" fill="#BA2025"/></g></svg>

  {{-- Hamburger Menu --}}
  <button class="hamburger hamburger--spring d-sm-none @if($acf_options->announcement) announcement @endif" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>

  <div class="row navigation">
    <div class="brand col-sm-4">
    <h1 class="page-title"><a href="{{ $url }}">@php echo esc_html( get_bloginfo( 'name' ) ); @endphp</a></h1>
      <h2>Your Multi-day Indoor Farmers’ Market in Edmonton.</h2>
    </div>
    <nav class="nav-primary d-none d-sm-flex col-sm-8">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
  @if ($hero)
    <div class="banner banner-hero row justify-content-center" style="background-image: radial-gradient(50% 55%, rgba(33,59,60,0.41) 37%, rgba(33,59,60,0.06) 64%), url('{{ $hero }}');">
      @if ($logo_choice === 'Yes')
        <img data-src="{{$logo}}" alt="Bountiful Farmers' Market" class="lazyload" />  
      @else
        @include('partials.page-header')
      @endif
    </div>
  @elseif ( tribe_is_event() )
    <div class="banner-events row justify-content-center">
      <div class="col-sm-7">
          <h2>Weekly Events</h2>
          <h3>At Bountiful Farmers' Market</h3>
          <p>Interested in becoming a performer on our Events Stage? <a href="https://bountifulmarkets.com/performance-application/">Apply here!</a></p>
      </div>
    </div>
  @elseif ( is_singular( 'vendors' ) )
    @include('partials.vendor-header')
  @elseif ( is_page_template( 'views/contests.blade.php' ) )
    @include('partials.contest-header')  
  @elseif (is_woocommerce())
    {{-- @include('partials.woo-header') --}}
  @else
    <div class="banner banner-sm row justify-content-center no-gutters">
        @include('partials.page-header')  
    </div>
  @endif	        				        			    
</header>