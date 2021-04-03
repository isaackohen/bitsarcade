<div class="container-fluid">
                                <div class="bonus-box" style="max-width: 1200px;">
    <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-bg1"><div class="btn btn-secondary m-1 p-2" onclick="$.vipBonus()">Claim Bonus</div></div>
                        <div class="text">
<div class="header"><h5>Daily Bonus</h5></div>
<p>Claim your daily bonus before midnight (GMT+1) every single day after getting to VIP Bronze.</p>

<p> Time left till next reset: <?php $timeLeft = 86400 - (time() - strtotime("today"));
echo date("H\\h  i\\m", $timeLeft); ?></p>
</div></div>
</div>

                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-welcome"><a class="btn btn-secondary m-1 p-2" data-mdb-toggle="collapse" href="#collapseExample" role="button" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-in" aria-expanded="false" aria-controls="collapseExample">More Info</a>

      </div>

      <!-- Collapsed content -->
                        <div class="text">
                            <div class="header"><h5>New Player Bonus</h5></div>

                            <p>Deposit and get up-to 200 free spins. Claim the spins after wagering your deposit amount.</p>
                            <p>Contact support if you need help with your deposit.</p>
<div class="collapse mt-1 border border-warning p-3" id="collapseExample">

<p>For every 1.00$ you get 2 Free Spins credited, so if your first deposit was 50$ you get 100 Free Spins. To claim your first player deposit spins, contact our live support.</p>

<p>This only applies to new players, not to multi-accounts.</p>
<button id="intercomopenlink" class="btn btn-primary p-2">Contact support after deposit</button>
</div></div>
</div></div>


                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-promocode"><div class="btn btn-secondary m-1 p-2" data-toggle-bonus-sidebar="promo">Enter Promocode</div>
</div>
                        <div class="text">
<div class="header"><h5>Promocode's</h5></div>
<p>Our Discord & Telegram bot automatically dispurses promocodes for DOGE coins, every 30 minutes.</p>
</div></div>
</div>

                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-faucet">
<div class="btn btn-secondary m-1 p-2" data-toggle-bonus-sidebar="wheel">Spin Wheel</div>
            <div class="wheel-popup" style="display: none">
                {!! __('bonus.wheel.prompt') !!}
            </div></div>
                        <div class="text">
<div class="header"><h5>Faucet</h5></div>
<p>Spin the wheel faucet every 3 minutes. No strings attached or any restricting wager requirements.</p>

</div></div>
</div>

                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-vip"><div class="btn btn-secondary m-1 p-2" onclick="$.vip()">Check VIP Progress & Rewards</div>
</div>
                        <div class="text">
<div class="header"><h5>VIP Reward Program</h5></div>
<p>Simply by playing you automatically work towards your first or next VIP level.</p>
</div></div>
</div>


                    <div class="col-12 col-sm-12 col-md-6">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-quizbg"><div class="btn btn-secondary m-1 p-2" onclick="redirect('{{ \App\Settings::where('name', 'discord_invite_link')->first()->value }}')">Join Discord</div>
</div>
                        <div class="text">
<div class="header"><h5>Rain & Quiz Bot</h5></div>
<p>Be active and get rewarded by our DOGE Rain Bot, dropping every 10 minutes!</p>
</div></div>
</div>



</div>
</div>
</div>

<div class="bonus-side-menu"></div>
