<div class="container-fluid">
                                <div class="bonus-box" style="max-width: 1370px;">
    <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-bg1"></div>
                        <div class="text">
<div class="header"><h5>Daily Bonus</h5></div>
<p>Claim a bonus before midnight (GMT+1) every day. Every bet you place a percentage goes toward your bonus, the percentage is based on your VIP Level.</p>

<p>You are able to claim your bonus once per day. Make sure to claim your bonus as it is reset at midnight. </p>

<p>Time left till next reset: <?php $timeLeft = 86400 - (time() - strtotime("today"));
echo date("H\\h  i\\m", $timeLeft); ?></p>
<div class="btn btn-primary p-2" onclick="$.vipBonus()">Claim Bonus</div>
</div></div>
</div>

                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-welcome"></div>
                        <div class="text">
<div class="header"><h5>New Player Bonus</h5></div>
<p>Deposit and get up to 200 free spins. To claim your free spins you must have wagered your first deposit amount.</p>

<p>For every 1.00$ you get 2 Free Spins credited, so if your first deposit was 50$ you get 100 Free Spins. To claim your first player deposit spins, contact our live support.</p>

<p>This only applies to new players, not to multi-accounts.</p>
<button id="intercomopenlink" class="btn btn-primary p-2">Contact support after deposit</button>
</div></div>
</div>

                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-promocode"></div>
                        <div class="text">
<div class="header"><h5>Promocode's</h5></div>
<p>Enter your promocode to instantly receive your reward.</p>

<p>Our Discord bot automatically dispurses promocodes for instant DOGE Coins, every 30 minutes.</p>

<p>Limit on amount of promocodes you can use every day is based on your VIP Level.</p>
<div class="btn btn-secondary m-1 p-2" onclick="redirect('https://discord.gg/ztNmeWADWq')">Join Discord</div><div class="btn btn-primary m-1 p-2" data-toggle-bonus-sidebar="promo">Enter Promocode</div>

</div></div>
</div>

                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-faucet"></div>
                        <div class="text">
<div class="header"><h5>Faucet</h5></div>
<p>Spin the wheel faucet every 3 minutes. No strings attached or wager requirements.</p>

<p>Get instant rewarded free faucet. Pick DOGE currency and get 50% increased reward!</p>

<p>You are only able to spin faucet if your balance is low enough. </p>
<div class="btn btn-primary p-2"  data-toggle-bonus-sidebar="wheel">Spin Wheel</div>
            <div class="wheel-popup" style="display: none">
                {!! __('bonus.wheel.prompt') !!}
            </div>
</div></div>
</div>

                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-vip"></div>
                        <div class="text">
<div class="header"><h5>VIP Reward Program</h5></div>
<p>Simply by playing you automatically work towards your next VIP level.</p>

<p>Get various rewards, such as bigger daily bonus, using VIP promocodes and more.</p>

<p>Unlock the first VIP level by only wagering 500.00$!</p>
<div class="btn btn-primary p-2" onclick="$.vip()">Check VIP Progress & Rewards</div>
</div></div>
</div>


                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="bonus-box-small">
                        <div class="banner-img banner-quizbg"></div>
                        <div class="text">
<div class="header"><h5>Rain & Quiz Bot</h5></div>
<p>Answer our Quiz bot first correctly and get rewarded.</p>

<p>Be active and get rewarded by our DOGE Rain Bot, dropping every 10 minutes!</p>

<p>Activity threshold is based on games played and chat participation.</p>
<br>
<div class="btn btn-primary p-2" onclick="redirect('https://discord.gg/ztNmeWADWq')">Join Discord</div>
</div></div>
</div>



</div>
</div>
</div>

<div class="bonus-side-menu"></div>
