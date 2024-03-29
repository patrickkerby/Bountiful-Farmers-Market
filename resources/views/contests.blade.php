 {{--
  Template Name: Contest Page
--}}

@php 
  // $winners = get_sub_field('slide');
@endphp

@extends('layouts.app')


@section('content')

  <section class="row justify-content-center intro no-gutters">
    @if($intro)
      <div class="col-md-10">
          <h3>{{ $intro }}</h3>
      </div>
    @endif
  </section>
  <section class="row justify-content-center vote">
    <div class="col-md-6 order-2 order-sm-1">             
      {!! $content !!}    
      <hr />
      <p>{{ $rules_text }} <a href="#" data-toggle="modal" data-target="#modal-rules">{{ $rules_link_text }}</a></p>
    </div>
    <div class="col-md-5 order-1 order-sm-2">      
      <div class="form">  
        <h2>{{ $form_title }}</h2>              
        @php gravity_form( $form, false, true, false, '', true, 12 ); @endphp
        <div>
          {!! $afterform !!}
        </div>
      </div>
    </div>
  </section>
  @if($vendors_title)
    <section class="row justify-content-center competitors">
      <h2 class="col-12">{{ $vendors_title }}</h2>
      @foreach( $content_blocks as $item )
        @php 
          if($loop->count > 4) {
            $col = 4;
          }
          else {
            $col = 12/$loop->count;
          }
        @endphp
        <div class="col-md-{{ $col }}">
          @if(!empty($item->image->url))
            <img class="thumb" src="{{ $item->image->url }}" />
          @endif
          <div class="content">
            <h5>{{ $item->title }}</h5>
            {!! $item->text !!}
            @if($item->recipe)
              <a href="#" class="recipe" data-toggle="modal" data-target="#modal{{ $loop->iteration }}">View Recipe</a>
            @endif
          </div>
        </div>
      @endforeach
    </section> 
  @endif
  @if($past_winners->title)   
    <section class="row justify-content-center winners">
      @if( $past_winners->winner_photos )  
        {{-- If there's more than 1 photo, display the title and description above the photos  --}}
        @foreach( $past_winners->winner_photos as $winner )
          @if ($loop->count > 1)
            @php 
              $single_photo = false;
            @endphp
          @else
            @php 
              $single_photo = true;
            @endphp
          @endif
        @endforeach
      
        @if ($single_photo)            
        <div class="col-md-10 winner_intro">
          <h3>{{ $past_winners->title }}</h3>
          <p>{!! $past_winners->description !!}</p>
        </div>
          @foreach( $past_winners->winner_photos as $winner )
            <div class="col-md-3 single-winner">
              <img src="{{ $winner->photo->url }}" />
              @if($winner->photo->caption)
                <span class="caption">{{ $winner->photo->caption }}</span>
              @endif
            </div>
            <div class="col-md-7 single-winner">
              <h3 class="title">{{ $winner->title }}</h3>
              <p>{!! $winner->description !!}</p>
              <a href="#" class="modal-link" data-toggle="modal" data-target="#modal{{ $loop->iteration }}-info">{{ $winner->additional_info_link }}</a>
            </div>
          @endforeach
        @else
          <div class="col-md-10 multi-winners winner_intro">
            <h3>{{ $past_winners->title }}</h3>
            <p>{!! $past_winners->description !!}</p>
          </div>
          @foreach( $past_winners->winner_photos as $winner )
            @if($loop->count >= 3)
                <div class="col-md-4">
                  <img src="{{ $winner->photo->url }}" />
                  @if($winner->photo->caption)
                    <span class="caption">{{ $winner->photo->caption }}</span>
                  @endif
                </div>  
            @elseif( $loop->count = 2)
              <div class="col-md-5">
                <img src="{{ $winner->photo->url }}" />
                @if($winner->photo->caption)
                  <span class="caption">{{ $winner->photo->caption }}</span>
                @endif
              </div>
            @endif
          @endforeach    
          
          <section class="row justify-content-center bios">
            @foreach( $past_winners->winner_photos as $winner )
              @php 
                $col = 12/$loop->count-1;
              @endphp
              <div class="col-md-{{ $col }}">
                <h3>{{ $winner->title }}</h3>
                <p>{!! $winner->description !!}</p>
                <a href="#" class="modal-link" data-toggle="modal" data-target="#modal{{ $loop->iteration }}-info">{{ $winner->additional_info_link }}</a>          
              </div>
            @endforeach
          </section>
        @endif
      @endif
    </section>
  @endif
  @if( $partners->partners_details )      
    <section class="row justify-content-center partners">
      @if( $partners->partners_details )
        {{-- If there's more than 1 photo, display the title and description above the photos  --}}
        @foreach( $partners->partners_details as $partner )
          @if ($loop->count > 1)
            @php 
              $single_partner = false;
            @endphp
          @else
            @php 
              $single_partner = true;
            @endphp
          @endif
        @endforeach
      
        @if ($single_partner)            
          @foreach( $partners->partners_details as $partner )
            <div class="col-md-4 single-winner">
              <img src="{{ $partner->photo->url }}" />
              @if($partner->photo->caption)
                <span class="caption">{{ $partner->photo->caption }}</span>
              @endif
            </div>
            <div class="col-md-5 single-winner">
              <h3>{{ $partner->title }}</h3>
              <p>{!! $partner->description !!}</p>
              <a href="#" class="modal-link" data-toggle="modal" data-target="#modal{{ $loop->iteration }}-info">{{ $partner->additional_info_link }}</a>
            </div>
          @endforeach
        @else
          <div class="col-md-10 multi-winners">
            <h3>{{ $partners->title }}</h3>
            <p>{!! $partners->description !!}</p>
          </div>
          @foreach( $partners->partners_details as $partner )
            @if($loop->count >= 3)
                <div class="col-md-4">
                  <img src="{{ $partner->photo->url }}" />
                  @if($partner->photo->caption)
                    <span class="caption">{{ $partner->photo->caption }}</span>
                  @endif
                </div>  
            @elseif( $loop->count = 2)
              <div class="col-md-5">
                <img src="{{ $partner->photo->url }}" />
                @if($partner->photo->caption)
                  <span class="caption">{{ $partner->photo->caption }}</span>
                @endif
              </div>
            @endif
          @endforeach    
          
          <section class="row justify-content-center bios">
            @foreach( $partners->partners_details as $partner )
              @php 
                $col = 12/$loop->count-1;
              @endphp
              <div class="col-md-{{ $col }}">
                <h3>{{ $partner->title }}</h3>
                <p>{!! $partner->description !!}</p>
                <a href="#" class="modal-link" data-toggle="modal" data-target="#modal{{ $loop->iteration }}-info">{{ $partner->additional_info_link }}</a>          
              </div>
            @endforeach
          </section>
        @endif
      @endif
    </section>
  @endif

  

@endsection
@foreach( $content_blocks as $item )
    <!-- Modal -->
  <div class="modal fade" id="modal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="#{{ $loop->iteration }}-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! $item->recipe !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal -->
<div class="modal fade" id="modal-rules" tabindex="-1" aria-labelledby="#rules-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! $contest_rules !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-bio" tabindex="-1" aria-labelledby="#bios-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! $bios !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@if(!empty($past_winners->winner_photos))
  @foreach( $past_winners->winner_photos as $winner )
  <!-- Modal -->
  <div class="modal fade" id="modal{{ $loop->iteration }}-info" tabindex="-1" aria-labelledby="#modal{{ $loop->iteration }}-info" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! $winner->additional_info !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endif

<div id="poster" class="d-none d-print-block container-fluid">
  <svg class="ribbon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 14" preserveAspectRatio="none"><g fill="none"><polygon points="0 14 120 14 120 0 0 0" fill="#D57974"/><polygon points="119 14 239 14 239 0 119 0" fill="#E9725D"/><polygon points="238 14 358 14 358 0 238 0" fill="#F4885D"/><polygon points="359 14 479 14 479 0 359 0" fill="#FFE686"/><polygon points="479 14 599 14 599 0 479 0" fill="#92BC5C"/><polygon points="599 14 719 14 719 0 599 0" fill="#264443"/><polygon points="719 14 840 14 840 0 719 0" fill="#007276"/><polygon points="839 14 959 14 959 0 839 0" fill="#354760"/><polygon points="959 14 1079 14 1079 0 959 0" fill="#0F1221"/><polygon points="1079 14 1204 14 1204 0 1079 0" fill="#21275C"/><polygon points="1200 14 1320 14 1320 0 1200 0" fill="#8E1821"/><polygon points="1320 14 1440 14 1440 0 1320 0" fill="#BA2025"/></g></svg>


  <section class="row justify-content-center">
    <div class="col-9">
      <h2>Recipe Contest at Bountiful Farmers' Market</h2>
    </div>
    @foreach( $content_blocks as $item )
      @php 
        $col = 12/$loop->count;
      @endphp
      <div class="col-{{ $col }} column">
        @if ($item->image->url)
          <img class="thumb" src="{{ $item->recipe_image->url }}" />
        @endif
        <div class="content">
          <h3 class="title">{{ $item->title }}</h3>
          {{-- <div class="recipe_intro">{!! $item->text !!}</div> --}}
          <div class="recipe">{!! $item->recipe !!}</div>
          <img class="vendor_image" src="{{ $item->image->url }}" />
        </div>
      </div>
    @endforeach
  </section>
</div>