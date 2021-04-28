<div class="container-fluid">
    <div class="bonus-box" style="max-width: 1200px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="bonus-box-small">
                    <div class="banner-img banner-bg1"><div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                        <div class="header"><h5>Daily Royalty</h5></div>
                        <p> Time left till next Daily reset: <?php $timeLeft = 86400 - (time() - strtotime("today"));
                        echo date("H\\h  i\\m", $timeLeft); ?></p>
                        <div class="btn btn-primary m-1 p-1" onclick="$.vipBonus()">More Info</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="bonus-box-small">
                <div class="banner-img banner-welcome">
                    <div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                        <div class="header"><h5>New Player Bonus</h5></div>
                        <p>Deposit and get 200 free spins. Claim spins after wagering your deposit amount.</p>
                        <a class="btn btn-primary m-1 p-1" data-mdb-toggle="collapse" href="#collapseExample" role="button" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-in" aria-expanded="false" aria-controls="collapseExample">More Info</a>
                    </div>
                </div>
                <div class="collapse mt-1 border border-warning p-3" id="collapseExample">
                    <p>For every 1.00$ you get 2 Free Spins credited, so if your first deposit was 50$ you get 100 Free Spins. To claim your first player deposit spins, contact our live support.</p>
                    <p>This only applies to new players, not to multi-accounts.</p>
                    <button id="intercomopenlink" class="btn btn-primary p-2">Contact support after deposit</button>
                </div>
            </div></div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="bonus-box-small">
                    <div class="banner-img banner-promocode">
                        <div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                            <div class="header"><h5>Promocode</h5></div>
                            <p>Our Discord & Telegram bot automatically dispurses promocodes for ETHEREUM <i class="{{ \App\Currency\Currency::find('eth')->icon() }}" style="color: {{ \App\Currency\Currency::find('eth')->style() }}"></i> coins, every 30 minutes.</p><div class="btn btn-primary m-1 p-1" data-toggle-bonus-sidebar="promo">Enter Code</div>
                        </div>
                    </div></div>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-faucet">
                            <div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                                <div class="header"><h5>Faucet</h5></div>
                                <p>Spin the wheel faucet once every day for 0.10$ to 1.00$. No strings attached or any restricting wager requirements.</p> <div class="btn btn-primary m-1 p-1" data-toggle-bonus-sidebar="wheel">Spin Wheel</div>
                            </div>
                            <div class="wheel-popup" style="display: none">
                                {!! __('bonus.wheel.prompt') !!}
                            </div></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="bonus-box-small">
                            <div class="banner-img banner-vip">
                                <div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                                    <div class="header"><h5>Loyalty Club Program</h5></div>
                                    <p>Simply play to work on your Loyalty Club Rank, each rank unlocks new reward features. First rank you just need to wager {{ \App\Settings::where('name', 'emeraldvip')->first()->value }}$ and immediately unlock the Daily Royalty Reward!</p><div class="btn btn-primary m-1 p-1" onclick="$.vip()">Loyalty Club</div>
                                </div>                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="bonus-box-small">
                                <div class="banner-img banner-quizbg">
                                    <div class="text" style="background: linear-gradient(176deg, #0f121bf2, #1a1d29fc); height: 100%;">
                                        <div class="header"><h5>Rain & Quiz Bot</h5></div>
                                        <p>Be active and get rewarded by our Ethereum Rain, Promocode Bot and Quiz Bot, dropping every 10 minutes.</p><div class="btn btn-primary m-1 p-1" onclick="redirect('{{ \App\Settings::where('name', 'discord_invite_link')->first()->value }}')">Join Discord</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-sm">
                   <div class="alert mt-1 mb-3 p-2 text-center" role="alert"><p class="mb-1"><button onclick="redirect('/earn/')" style="font-size: 10px;" class="btn btn-danger p-1 mt-1">HOT</button> Complete offers on <a href="/earn/"> Earn Wall</a> for free instant ETHEREUM!</p></div>
                </div>

            </div>
            <div class="bonus-side-menu"></div>