<div class="banner-vendor row justify-content-center">
    <div class="col-sm-5">
      <h2><span>Vendor Profile:</span> {!! App::title() !!}</h2>
      <ul>
        <li><span>Stall</span><br /> {{ $stall_numbers }}</li>
        <li><a href="//twitter.com/{{ $vendor_social->twitter }}">Twitter</a></li>
        <li><a href="//fb.com/{{ $vendor_social->facebook }}">Facebook</a></li>
        <li><a href="//instagram.com/{{ $vendor_social->instagram }}">Instagram</a></li>
        <li><a href="//{{ $vendor_social->website }}">{{ $vendor_social->website }}</a></li>
      </ul>
    </div>
    <div class="col-sm-5">
      <img src="{{ $vendor_feature_image->url }}" />
    </div>
  </div> 