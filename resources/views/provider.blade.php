@php
    if(\App\Slotslist::where('p', $url)->count() == null) {
        header('Location: /');
        die();
    }
@endphp
<div class="container-lg">
                  <div class="card nope p-2" style="max-height: 75px; background: transparent !important;">

                  <div onclick="redirect('/provider/{{ $url }}')" class="providers m-1 p-2" style=" box-shadow: -3px -3px 8px 1px #11141fcf, 2px 2px 8px 0px #0d0d0dcf, inset 1px 1px 0px 0px #1f2330 !important; background-image:url(/img/providers/{{ $url }}_small.webp)">                  </div>
              </div>
<div class="our-games" style="border-radius: 0px !important; background: #181b26 !important;">

            <input type="text" id="gamelist-search" class="input m-2 mb-4 p-2" placeholder="Search {{ $url }} games..">

           @foreach(\App\Slotslist::get() as $slots)
               @if($slots->p == $url)
            <div class="card gamepostercard m-2">
            @if(!auth()->guest())
            <div class="slots_small_poster" onclick="redirect('/slots/{{ $slots->id }}')"  >
                    <img class="img-small-slots" data-src="/img/slots_webp/{{ $slots->id }}.webp">
             @else
                <div class="slots_small_poster" onclick="$.register()">
                    <img class="img-small-slots" data-src="/img/slots_webp/{{ $slots->id }}.webp">
            @endif
                    <div class="label">
                    {{ $slots->p }}
                </div>
                    <div class="name">
                        <div class="name-text">
                            <div class="title">{{ $slots->n }}</div>
                            <div class="desc">{{ $slots->desc }}</div>
                @if(!auth()->guest())               
                            <button class="btn btn-secondary" onclick="redirect('/slots/{{ $slots->id }}')">Play</button>                  
                @else
                            <button class="btn btn-primary" onclick="$.register()">
                                Login
                            </button>
                @endif                                    
                        </div>
                    </div>
                </div>
               <div class="card-footer " style="max-width: 190px;">
                <small>{{ $slots->n }}</small></div>
            </div>
            @endif
        @endforeach
</div>

</div>
