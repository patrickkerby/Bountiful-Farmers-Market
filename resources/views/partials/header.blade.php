@php 
  $hero = get_field('background_image');
  $overlay = get_field('overlay');	
  $logo = get_field('logo');
  $sub_title = get_field('sub_title');
@endphp

<header>
  <div class="row">
    <div class="brand col-md-4">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <h2>Your Multi-day Indoor Farmers’ Market in Edmonton.</h2>
    </div>
    <nav class="nav-primary d-none d-md-block col-md-8">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
  <div class="banner" style="background-image: linear-gradient(-176deg, rgba(0,114,118,0.20) 32%, rgba(0,114,118,0.54) 56%, rgba(38,68,67,0.63) 99%), url('{{ $hero }}');">
    <img src="{{$logo}}" />
    <div class="row subtitle justify-content-center">
      <div class="col-md-7">@php echo $sub_title; @endphp </div>
    </div>   
  </div> 	        				        			    
</header>