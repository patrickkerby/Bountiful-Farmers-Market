<div class="banner-vendor row justify-content-center">
    <div class="col-md-5">
      <h2><span>Vendor Profile:</span> {!! App::title() !!}</h2>
      <ul>
        <li><span>Stall</span><br /> {{ $stall_numbers }}</li>
        <li class="twitter"><a href="//twitter.com/{{ $vendor_social->twitter }}" target="_blank"><img src="@asset('images/twitter.svg')" /></a></li>
        <li><a href="//fb.com/{{ $vendor_social->facebook }}" target="_blank"><img src="@asset('images/facebook.svg')" /></a></li>
        <li><a href="//instagram.com/{{ $vendor_social->instagram }}" target="_blank"><img src="@asset('images/instagram.svg')" /></a></li>
        <li><a href="mailto://{ $vendor_social->email }}" target="_blank"><img src="@asset('images/email.svg')" /></a></li>
        <li class="website"><a href="//{{ $vendor_social->website }}" target="_blank">{{ $vendor_social->website }}</a></li>
      </ul>
    </div>
    <div class="col-md-5 profile-img">
      <img src="{{ $vendor_feature_image->url }}" />
    </div>
  </div> 