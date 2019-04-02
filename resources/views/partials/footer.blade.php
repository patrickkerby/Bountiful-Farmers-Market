@php
  $footer_logo = get_field('logo', 'option');
  $address = get_field('address', 'option'); 
@endphp

<footer class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm-4">
        @php the_field('address', 'option'); @endphp
    </div>
    <div class="col-sm-4">
      <img src="{{ $footer_logo }}" />
    </div>
    <div class="col-sm-4">
      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 14" width="auto" preserveAspectRatio="none"><g fill="none"><polygon points="0 14 120 14 120 0 0 0" fill="#D57974"/><polygon points="119 14 239 14 239 0 119 0" fill="#E9725D"/><polygon points="238 14 358 14 358 0 238 0" fill="#F4885D"/><polygon points="359 14 479 14 479 0 359 0" fill="#FFE686"/><polygon points="479 14 599 14 599 0 479 0" fill="#92BC5C"/><polygon points="599 14 719 14 719 0 599 0" fill="#264443"/><polygon points="719 14 840 14 840 0 719 0" fill="#007276"/><polygon points="839 14 959 14 959 0 839 0" fill="#354760"/><polygon points="959 14 1079 14 1079 0 959 0" fill="#0F1221"/><polygon points="1079 14 1204 14 1204 0 1079 0" fill="#21275C"/><polygon points="1200 14 1320 14 1320 0 1200 0" fill="#8E1821"/><polygon points="1320 14 1440 14 1440 0 1320 0" fill="#BA2025"/></g></svg>
</footer>
