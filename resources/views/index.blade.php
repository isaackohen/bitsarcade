@if(auth()->guest())
<div class="slider">
  <div class="glide" id="slider">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides">
        <li class="glide__slide" style="background: linear-gradient(50deg, rgb(10, 93, 88), rgb(33, 34, 36)); background-size: contain;">
          <div class="image" style="background-image: url({{ asset('/img/misc/get-start.png') }}); background-size: contain;"></div>
          <div class="slideContent">
            <div class="slideContentWrapper" style="box-shadow: 0 0 10px rgb(28 39 60 / 5%); background: url(/img/misc/arrows.svg), linear-gradient( #16928d, #084643) !important;">
              <div class="description">Join the community!</div>
              <div class="s-buttons" style="color: white;">
                <a href="https://twitter.com/bitsarcade_com" target="_blank" class="is-twitter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" svg-inline="" role="presentation" focusable="false" tabindex="-1"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><span>Twitter</span></a><a href="https://t.me/BitsArcade" target="_blank" class="is-telegram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" svg-inline="" role="presentation" focusable="false" tabindex="-1"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path></svg><span>Telegram</span></a><a href="https://discord.gg/ztNmeWADWq" target="_blank" class="is-discord"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" svg-inline="" role="presentation" focusable="false" tabindex="-1"><path d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736                       56.576-1.792 78.336-38.912 78.336-38.912z"></path></svg><span>Discord</span></a>
              </div>
            </div>
          </div>
        </li>
        <li class="glide__slide" style="background: linear-gradient(302deg, rgb(212 109 28), rgb(101 38 0)); background-size: contain;">
          <div class="image" style="background-image: url({{ asset('/img/misc/slide_vip.png') }}); background-size: contain;"></div>
          <div class="slideContent">
            <div class="slideContentWrapper" style="box-shadow: 0 0 10px rgb(28 39 60 / 5%); background: url(/img/misc/arrows.svg),linear-gradient(#ff7907, #a04625)  !important;">
              <div class="description">Promotions and freebies!</div>
              <div class="s-buttons" style="color: white;"><a href="/bonus/" target="_blank" class="is-medium">
                <svg height="512pt" viewBox="0 -61 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m91 300v90h330v-90zm0 0" fill="#ff9f00"/><path d="m256 300h165v90h-165zm0 0" fill="#ff7816"/><path d="m422.5 169.199219-24.300781 47.398437h-284.398438l-24.300781-47.398437c35.699219-49.5 97.800781-79.199219 166.5-79.199219s130.800781 29.699219 166.5 79.199219zm0 0" fill="#ff4b00"/><path d="m422.5 169.199219-24.300781 47.398437h-142.199219v-126.597656c68.699219 0 130.800781 29.699219 166.5 79.199219zm0 0" fill="#cc1e0d"/><path d="m477.101562 139.199219-56.101562 190.800781h-330l-56.101562-190.800781 37.800781-14.398438c17.101562 32.699219 49.800781 51.898438 76.5 55.199219h15.601562c34.5-5.398438 60.296875-58.199219 70.800781-108.601562h40.800782c10.5 50.402343 36.300781 103.203124 70.796875 108.601562h15.601562c26.699219-3.300781 59.398438-22.5 76.5-55.199219zm0 0" fill="#fdbf00"/><path d="m477.101562 139.199219-56.101562 190.800781h-165v-258.601562h20.398438c10.503906 50.402343 36.300781 103.203124 70.800781 108.601562h15.601562c26.699219-3.300781 59.398438-22.5 76.5-55.199219zm0 0" fill="#ff9f00"/><path d="m46 150c-24.8125 0-46-20.1875-46-45s21.1875-45 46-45 45 20.1875 45 45-20.1875 45-45 45zm0 0" fill="#ff9f00"/><path d="m466 150c-24.8125 0-45-20.1875-45-45s20.1875-45 45-45 46 20.1875 46 45-21.1875 45-46 45zm0 0" fill="#ff7816"/><path d="m256 0c-24.902344 0-45 20.097656-45 45 0 24.898438 20.097656 45 45 45s45-20.101562 45-45c0-24.902344-20.097656-45-45-45zm0 0" fill="#ff9f00"/><path d="m256 173.699219-51.300781 51.300781 51.300781 51.300781 51.300781-51.300781zm0 0" fill="#ff4b00"/><path d="m346 233.785156 21.210938 21.210938-21.210938 21.210937-21.210938-21.210937zm0 0" fill="#cc1e0d"/><path d="m166 233.785156 21.210938 21.210938-21.210938 21.210937-21.210938-21.210937zm0 0" fill="#ff4b00"/><path d="m256 90v-90c24.902344 0 45 20.097656 45 45 0 24.898438-20.097656 45-45 45zm0 0" fill="#ff7816"/><path d="m307.300781 225-51.300781 51.300781v-102.601562zm0 0" fill="#cc1e0d"/></svg><span>VIP</span></a><a href="/bonus/" target="_blank" class="is-twitter"><svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m497 241h15v-150h-361l-15 30-15-30h-121v150h15c8.401 0 15 6.599 15 15s-6.599 15-15 15h-15v150h121l15-30 15 30h361v-150h-15c-8.401 0-15-6.599-15-15s6.599-15 15-15z" fill="#ff5959"/></g><path d="m316 421h196v-150h-15c-8.401 0-15-6.599-15-15s6.599-15 15-15h15v-150h-196z" fill="#e63a57"/><g id="Coupon_1_"><path d="m256 151c-24.814 0-45 20.186-45 45s20.186 45 45 45 45-20.186 45-45-20.186-45-45-45zm0 60c-8.271 0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.729 15-15 15z" fill="#f3f5f9"/><path d="m376 271c-24.814 0-45 20.186-45 45s20.186 45 45 45 45-20.186 45-45-20.186-45-45-45zm0 60c-8.271 0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.729 15-15 15z" fill="#e1e6f0"/><g><path d="m216.149 241.002h199.702v29.997h-199.702z" fill="#f3f5f9" transform="matrix(.707 -.707 .707 .707 -88.465 298.426)"/></g><g><path d="m121 361h30v60h-30z" fill="#54548c"/></g><g><path d="m121 271h30v60h-30z" fill="#54548c"/></g><g><path d="m121 181h30v60h-30z" fill="#54548c"/></g><g><path d="m121 91h30v60h-30z" fill="#54548c"/></g></g><path d="m316 277.211 81.211-81.211-21.211-21.211-60 60z" fill="#e1e6f0"/></g></svg><span>Promocode</span></a><a href="/earn/" target="_blank" class="is-telegram"><svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m121 0c-66.167 0-121 53.833-121 120s54.833 120 121 120 120-53.833 120-120-53.833-120-120-120z" fill="#fed843"/><path d="m121 0v240c66.167 0 120-53.833 120-120s-53.833-120-120-120z" fill="#ffb64c"/><g fill="#ffb64c"><path d="m106 180v28.488c4.904.828 9.862 1.512 15 1.512s10.096-.685 15-1.512v-28.488h-15z"/><path d="m121 30c-5.138 0-10.096.685-15 1.512v28.488h15 15v-28.488c-4.904-.827-9.862-1.512-15-1.512z"/></g><path d="m136 180h-15v30c5.138 0 10.096-.685 15-1.512z" fill="#ff9100"/><path d="m136 31.512c-4.904-.827-9.862-1.512-15-1.512v30h15z" fill="#ff9100"/><g><g><path d="m391 0c-66.301 0-120 53.699-120 120s53.699 120 120 120 121-53.699 121-120-54.699-120-121-120z" fill="#ff7b4a"/></g></g><path d="m512 120c0 66.301-54.699 120-121 120v-240c66.301 0 121 53.699 121 120z" fill="#ec5569"/><path d="m482 120c0 49.799-41.201 90-91 90s-90-40.201-90-90 40.201-90 90-90 91 40.201 91 90z" fill="#f0f7ff"/><path d="m482 120c0 49.799-41.201 90-91 90v-180c49.799 0 91 40.201 91 90z" fill="#dfe7f4"/><g><path d="m436 105v30h-60v-75h30v45z" fill="#47568c"/></g><circle cx="256" cy="330" fill="#a19ce4" r="60"/><path d="m316 330c0-33.091-26.909-60-60-60v120c33.091 0 60-26.909 60-60z" fill="#7984eb"/><path d="m409.223 286.626-6.738 13.315c-28.082 55.547-84.214 90.059-146.485 90.059s-118.389-34.497-146.484-90.044l-6.738-13.315-53.687 26.792 6.797 13.462c23.555 46.611 62.686 83.687 110.118 104.37l.014 80.735h89.98 90v-80.735c47.446-20.698 86.543-57.773 110.098-104.385l6.797-13.447z" fill="#a19ce4"/><path d="m346 431.265c47.446-20.698 86.543-57.773 110.098-104.385l6.797-13.447-53.672-26.807-6.738 13.315c-28.082 55.547-84.214 90.059-146.485 90.059v122h90z" fill="#7984eb"/><path d="m436 105v30h-45v-75h15v45z" fill="#29376d"/><path d="m121 105c-8.276 0-15-6.724-15-15s6.724-15 15-15 15 6.724 15 15h30c0-24.814-20.186-45-45-45s-45 20.186-45 45 20.186 45 45 45c8.276 0 15 6.724 15 15s-6.724 15-15 15-15-6.724-15-15h-30c0 24.814 20.186 45 45 45s45-20.186 45-45-20.186-45-45-45z" fill="#ffb64c"/><g fill="#ff9100"><path d="m136 90h30c0-24.814-20.186-45-45-45v30c8.276 0 15 6.724 15 15z"/><path d="m166 150c0-24.814-20.186-45-45-45v30c8.276 0 15 6.724 15 15s-6.724 15-15 15v30c24.814 0 45-20.186 45-45z"/></g></g></svg><span>Surveys</span></a><a href="/bonus/" target="_blank" class="is-discord"><svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Flat"><path d="m320 456h-128l30.86-144 17.14-80h32l17.14 80 4.04 18.84z" fill="#eedc9a"/><path d="m320 456h-128c58.34009 0 103.52-47.62988 103.52-103.25977a104.46244 104.46244 0 0 0 -2.34009-21.90039z" fill="#eebe33"/><circle cx="256" cy="232" fill="#d3e1e9" r="176"/><path d="m256 128v-16" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="16"/><path d="m301.56006 61.96-45.56006 170.04-45.56006-170.04a177.11865 177.11865 0 0 1 91.12012 0z" fill="#e88604"/><path d="m380.45 107.55005-124.45 124.44995 45.56006-170.04a175.78173 175.78173 0 0 1 78.88994 45.59005z" fill="#e44b4d"/><path d="m432 232a175.94173 175.94173 0 0 1 -5.96 45.56006l-170.04-45.56006 170.04-45.56006a175.94036 175.94036 0 0 1 5.96 45.56006z" fill="#396795"/><path d="m426.04 277.56006a175.78193 175.78193 0 0 1 -45.59 78.89014l-124.45-124.4502z" fill="#802787"/><path d="m380.45 356.4502a175.78348 175.78348 0 0 1 -78.88994 45.5898l-45.56006-170.04z" fill="#349966"/><path d="m301.56006 402.04a177.11865 177.11865 0 0 1 -91.12012 0l45.56006-170.04z" fill="#e88604"/><path d="m256 232-45.56006 170.04a175.78348 175.78348 0 0 1 -78.88989-45.58984z" fill="#e44b4d"/><path d="m256 232-170.04 45.56006a177.11865 177.11865 0 0 1 0-91.12012z" fill="#396795"/><path d="m256 232-170.04-45.56006a175.78109 175.78109 0 0 1 45.59009-78.88989z" fill="#802787"/><path d="m256 232-124.44995-124.44995a175.78173 175.78173 0 0 1 78.88989-45.59005z" fill="#349966"/><g fill="#2f4054"><path d="m184 97.149h16v48h-16z" transform="matrix(.866 -.5 .5 .866 -34.851 112.231)"/><path d="m137.149 144h15.999v48h-15.999z" transform="matrix(.5 -.866 .866 .5 -72.918 209.703)"/><path d="m104 224h48v16h-48z"/><path d="m121.149 288h48v15.999h-48z" transform="matrix(.866 -.5 .5 .866 -128.559 112.239)"/><path d="m168 334.851h48v16h-48z" transform="matrix(.5 -.866 .866 .5 -200.918 337.703)"/><path d="m248 336h16v48h-16z"/><path d="m312 318.851h16v48h-16z" transform="matrix(.866 -.5 .5 .866 -128.554 205.933)"/><path d="m358.851 272h15.999v48h-15.999z" transform="matrix(.5 -.866 .866 .5 -72.918 465.703)"/><path d="m360 224h48v16h-48z"/><path d="m342.851 160h48v15.999h-48z" transform="matrix(.866 -.5 .5 .866 -34.85 205.945)"/><path d="m296 113.149h48v16h-48z" transform="matrix(.5 -.866 .866 .5 55.082 337.703)"/><path d="m248 80h16v48h-16z"/></g><path d="m368 472a15.97876 15.97876 0 0 1 -16 16h-192a16 16 0 1 1 0-32h192a15.99564 15.99564 0 0 1 16 16z" fill="#eedc9a"/><circle cx="256" cy="232" fill="#2f4054" r="32"/><path d="m243.19223 24h25.61554a16 16 0 0 1 13.98652 23.77029l-26.79429 48.22971-26.79429-48.22971a16 16 0 0 1 13.98652-23.77029z" fill="#eedc9a"/><path d="m236.19873 43.88574a8.00079 8.00079 0 0 1 6.99365-11.88574h25.61524a8.00079 8.00079 0 0 1 6.99365 11.88574l-19.80127 35.6416z" fill="#e44b4d"/><path d="m368 472a15.97876 15.97876 0 0 1 -16 16h-192a15.99564 15.99564 0 0 1 -16-16h192a15.97876 15.97876 0 0 0 16-16 15.99564 15.99564 0 0 1 16 16z" fill="#eebe33"/></g></svg><span>Faucet</span></a></div></div></div></li></ul></div>
              </div>
            </div>
            @include('modals.nav')
            @else
            <div class="container">
              <div class="games">
                <div class="our-games mb-1" style="background: transparent !important;">
                  <div class="row">
                    @foreach(\App\GlobalNotification::get() as $notification)
              <div class="col-md-12">
                <div class="d-flex">
                  @if(!auth()->guest() && auth()->user()->isDismissed($notification)) @continue @endif
                  <div class="globalNotification p-2 m-0 mb-2" id="emailNotification" style="background: url(/img/misc/arrows.svg), linear-gradient(#3596f5, #297dd0) !important; box-shadow: 0 10px 20px 0 rgb(0 0 0 / 25%);">
                    <div class="icon"><i class="{{ $notification->icon }}"></i></div>
                    <div class="text">{{ $notification->text }}</div>
                  </div>
                </div>
              </div>
              @endforeach
                    <div class="col-md-3 col-sm-12 mt-2 mb-">
                        <div class="card text-center" style="min-height: 275px;">
                        <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Profile</div>
                        <div class="card-body" style="background: url(/img/misc/patternbg.png), linear-gradient(59deg, #313841, #2c323a) !important;">
                          <h5 class="card-title">{{ auth()->user()->name }}</h5>
                          <p class="card-text">
                            <img onclick="redirect('/user/{{ auth()->user()->_id }}')" src="{{ auth()->user()->avatar }}" alt>
                          </p>
                          <button onclick="$.wallet()" class="btn btn-secondary p-1 m-1">Wallet</button>
                          <button onclick="$.leaderboard()" class="btn btn-secondary p-1 m-1">Leaderboard</button>
                        <button data-toggle-bonus-sidebar="promo" class="btn btn-danger p-1 m-1">Promocode</a>
                      </div>
                      <div class="card-footer text-muted" style="font-size: 0.79rem; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Registered since {{ auth()->user()->created_at }}</div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12 mt-2 mb-3">
                    <div class="card text-center" style="background: url(https://cdn.coingape.com/wp-content/uploads/2019/05/02174558/Dogecoin-DOGE-Price-On-Leap-As-Largest-Exchange-Bid-To-Support-DOGE-on-Official-Wallet-678x381.jpg), linear-gradient(59deg, #2b2d2d, #26282900) !important;background-size: contain !important;min-height: 275px;height: 100% !important;background-position: center;background-repeat: no-repeat; scale: 0.8;">
                      <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Featured News</div>
                      <div class="card-body" style="background: linear-gradient( #22272ef7,  #1f2226ed) !important;">
                        <h5 class="card-title">{{ \App\Settings::where('name', 'featured_newsbox_title')->first()->value }}</h5>
                        <p class="card-text" style="text-shadow: 2px 2px black !important;"><h6>
                          {{ \App\Settings::where('name', 'featured_newsbox_text')->first()->value }}</h6>
                        </p>
                        <p class="card-text" style="text-shadow: 1px 1px black !important;"><h5>
                          {{ \App\Settings::where('name', 'featured_newsbox_text_2')->first()->value }}</h5>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mt-2 mb-2">
                        <div class="card text-center" style="min-height: 275px;">
                      <div class="card-header" style="background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">Bonus</div>
                      <div class="card-body" style="background: url(/img/misc/patternbg.png), linear-gradient(59deg, #313841, #2c323a) !important;">
                        <h5 class="card-title">Freebies!</h5>
                        <p class="card-text">
                          Check all promotions such as deposit bonus <a href="/bonus">here</a>!
                        </p>
                        <a href="/bonus" class="btn btn-secondary p-2 m-1">Faucet</a>
                        <a onclick="$.vip()" class="btn btn-success p-2 m-1">VIP</a>
                        <a onclick="$.vipBonus()" class="btn btn-pink p-2 m-1">Daily Bonus</a>
                        <a href="/earn" class="btn btn-info p-2 m-1">Earn Wall</a>
                      </div>
                      <div class="card-footer text-muted" style="font-size: 0.79rem; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">VIP Level - {{ __('vip.rank.'.(auth()->user()->vipLevel() == 5 ? 4 : auth()->user()->vipLevel())) }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          <?php
          $client = new \outcomebet\casino25\api\client\Client(array(
          'url' => 'https://api.c27.games/v1/',
          'sslKeyPath' => env('c27_path'),
          ));
          $games = $client->listGames();
          $games = array_slice($games['Games'], 0, 1500);
          $featuredslots = \App\Settings::where('name', 'slots_featured_1')->first()->value;
          ?>
          <div class="container">
              @if(!auth()->guest())
              @else
              <div class="noempty-margin-box mt-4 p-2">
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                    <div class="button-bar-small" onclick="redirect('/partner/')">
                      <div class="text" style="background: url(/img/misc/arrows.svg), linear-gradient(#0286f2, #015ea9) !important; border-radius: 12px;">
                        <h5 style="margin-bottom: 1px; font-weight: 600;">Partner</h5>
                        <p>Earn money up-to <b>0.15% of all of your referred player's bets</b> and other benefits!</p>
                      </div></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="button-bar-small" onclick="redirect('/bonus/')">
                        <div class="text" style="background: url(/img/misc/arrows.svg), linear-gradient(#ff7907, #a04625) !important; border-radius: 12px;">
                          <h5 style="margin-bottom: 1px; font-weight: 600;">Daily Bonus</h5>
                          <p>You play, <b>we pay</b>. After reaching Bronze VIP level you are eligible for a daily juicy bonuses.</p>
                        </div></div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="button-bar-small" onclick="redirect('/earn/')">
                          <div class="text" style="background: url(/img/misc/arrows.svg), linear-gradient(#0fc359, #11813f) !important; border-radius: 12px;">
                            <h5 style="margin-bottom: 1px; font-weight: 600;">Earn</h5>
                            <p>Get credited <b>straight DOGE</b> to your account doing surveys and other tasks.</p>
                          </div></div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <div class="our-games mb-0 mt-2" style="border-top-right-radius: 12px !important; border-top-left-radius: 12px !important; border-radius: 0px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">
                      <ul class="nav nav-tabs" id="ex1" role="tablist" style="justify-content: center;">
                        <li class="btn btn-primary p-1 m-1 nav-item"  role="presentation">
                          <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="true">Featured</a>
                        </li>
                        <li class="btn btn-primary p-1 m-1 nav-item" role="presentation">
                          <a class="nav-link" href="/gamelist/">All Games</a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content" id="ex2-content">
                      <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="our-games" style="border-radius: 0px !important;">
                          
                          @foreach(\App\Games\Kernel\Game::list() as $game)
                          @if(!$game->isDisabled() &&  $game->metadata()->id() !== "slotmachine")
                          <div class="card gamepostercard" style="cursor: pointer;  margin-left: 1.4vh; margin-right: 1.4vh; margin-bottom: 3.5vh;" onclick="redirect('/game/{{ $game->metadata()->id() }}')">
                            <div class="game_poster card-img-top game-{{ $game->metadata()->id() }}" @if(!$game->isDisabled()) onclick="redirect('/game/{{ $game->metadata()->id() }}')" @endif>
                              <?php
                              $getname = $game->metadata()->name();
                              ?>
                              @if($getname == "Dice")
                              <div class="label-red">
                                HOT!
                              </div>
                              @elseif($getname == "Triple")
                              <div
                                class="label-red">
                                NEW GAME!
                              </div>
                              @endif
                              <div class="label-fair">
                                FAIR
                              </div>
                              <div class="name">
                                <div class="name-text">
                                  <div class="title">
                                    {{ $game->metadata()->name() }}
                                  </div>
                                  <button class="btn btn-secondary"  onclick="redirect('/game/{{ $game->metadata()->id() }}')">Play</button>
                                </div>
                              </div>
                            </div>
                            
                            <div class="card-footer p-2">
                              <h7 class="card-title">{{ $game->metadata()->name() }}</h7> -
                              <a href="/fairness" target="_blank" style="text-transform: capitalize;">Provably Fair</a></div>
                            </div>
                            @else
                            @endif
                            @endforeach
                            @foreach($games as $game)
                            @if(in_array($game["Id"], explode(',', $featuredslots)))
                            
                            <div class="card gamepostercard" style="cursor: pointer; margin-left: 1.4vh; margin-right: 1.4vh; margin-bottom: 3.5vh;">
                              @if(!auth()->guest())
                              <a href="/slots/{{$game['Id']}}"><div class="game_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)" loading="lazy"></a>
                              @else
                              <div class="game_poster" style="background-image:url(/img/slots/{{$game['SectionId']}}/{{$game['Id']}}.jpg)" loading="lazy">
                                @endif
                                <div class="label" style="opacity: 1;">
                                  {{ $game['SectionId'] }}
                                </div>
                                <div class="name">
                                  <div class="name-text">
                                    <div class="title">{{ $game['Name'] }}</div>
                                    @if(!auth()->guest())
                                    
                                    <a href="/slots/{{$game['Id']}}"><button class="btn btn-secondary">Play</button></a>
                                    @else
                                    <button class="btn btn-primary" onclick="$.register()">
                                    Login
                                    </button>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="card-footer p-2">
                              <h7 class="card-title m-1">{{ $game['Name'] }}</h7></div>
                            </div>
                            @endif
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="our-games mt-4" style="border-radius: 12px; background: url(/img/misc/arrows.svg), linear-gradient(59deg, #313841, #2c323a) !important;">
                      <button class="btn btn-primary" onclick="redirect('/gamelist')">Check All 1102 Games</button> <img src="/img/logo/logo_temp.png" width="32px" height="32px" style="margin-left: 10px; margin-right: 10px;">
                    </div>
                  <div class="bonus-side-menu"></div>