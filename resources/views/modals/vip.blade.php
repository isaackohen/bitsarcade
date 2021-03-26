<div
  class="vip modal fade"
  id="vip modal"
  tabindex="-1"
    style="display: block; padding-right: 15px;"
  aria-labelledby="vip modal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
                    <div class="tabs">
                <div class="tab active" data-wallet-toggle-tab="vip-rewards">
                    VIP Rewards
                </div>
                <div class="tab" onclick="$.gotovipBonus()" data-wallet-toggle-tab="vip-bonus">
                    Daily Bonus
                </div>
            </div>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="vip modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="ui-blocker" style="display: none;">
            <div class="loader"><div></div></div>
        </div>
        <div data-wallet-tab-content="vip-rewards">
        <div ss-container class="modal-scrollable-content" >
            <img class="vip-logo" src="/img/misc/vip-icon.svg" alt>

            @php
                $currency = auth()->user()->closestVipCurrency();
                $breakpoints = [
                    1 => floatval($currency->option('vip_bronze')),
                    2 => floatval($currency->option('vip_silver')),
                    3 => floatval($currency->option('vip_gold')),
                    4 => floatval($currency->option('vip_platinum')),
                    5 => floatval($currency->option('vip_diamond'))
                ];

                $percent = number_format(auth()->user()->vipLevel() == 5 ? 100 : (\Illuminate\Support\Facades\DB::table('games')->where('user', auth()->user()->_id)->where('currency', $currency->id())->where('demo', '!=', true)->where('status', '!=', 'in-progress')->where('status', '!=', 'cancelled')->sum('wager') / $breakpoints[auth()->user()->vipLevel() + 1]) * 100, 2, '.', '');
            @endphp

            <div class="vipDesc mb-4 mt-4">{{ __('vip.description', ['currency' => auth()->user()->closestVipCurrency()->name()]) }}</div>
            <div class="vipDesc mb-2">{{ __('vip.description.2', ['currency' => auth()->user()->closestVipCurrency()->name()]) }}</div>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%;">{{ $percent < 8 ? '' : $percent.'%' }}</div>
            </div>
            <div class="vipProgress m-1 mb-4">
                <div>
                    {{ __('vip.rank.'.(auth()->user()->vipLevel() == 5 ? 4 : auth()->user()->vipLevel())) }}
                </div>
                <div>
                    @switch(auth()->user()->vipLevel() == 5 ? 5 : auth()->user()->vipLevel() + 1)
                        @case(1)
                            <svg><use href="#vip-bronze"></use></svg>
                            @break
                        @case(2)
                            <svg><use href="#vip-silver"></use></svg>
                            @break
                        @case(3)
                            <svg><use href="#vip-gold"></use></svg>
                            @break
                        @case(4)
                            <svg><use href="#vip-platinum"></use></svg>
                            @break
                        @case(5)
                            <svg><use href="#vip-diamond"></use></svg>
                            @break
                    @endswitch
                    {{ __('vip.rank.'.(auth()->user()->vipLevel() == 5 ? 5 : auth()->user()->vipLevel() + 1)) }}
                </div>
            </div>
            <div class="font-weight-bold mb-1">{{ __('vip.benefits') }}</div>
            <div class="expandableBlock">
                <div class="expandableBlockHeader">
                    <svg><use href="#vip-bronze"></use></svg>
                    {{ __('vip.rank.1') }}
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="expandableBlockContent" style="display: none;">
                    <ul>
                        <li>{{ __('vip.benefit_list.bronze.1') }}</li>
                        <li>{{ __('vip.benefit_list.bronze.2') }}</li>
                        <li>{{ __('vip.benefit_list.bronze.3') }}</li>
                        <li>{{ __('vip.benefit_list.bronze.4') }}</li>
                    </ul>
                </div>
            </div>
            <div class="expandableBlock">
                <div class="expandableBlockHeader">
                    <svg><use href="#vip-silver"></use></svg>
                    {{ __('vip.rank.2') }}
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="expandableBlockContent" style="display: none;">
                    <ul>
                        <li>{{ __('vip.benefit_list.silver.1') }}</li>
                        <li>{{ __('vip.benefit_list.silver.2') }}</li>
                        <li>{{ __('vip.benefit_list.silver.3') }}</li>
                    </ul>
                </div>
            </div>
            <div class="expandableBlock">
                <div class="expandableBlockHeader">
                    <svg><use href="#vip-gold"></use></svg>
                    {{ __('vip.rank.3') }}
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="expandableBlockContent" style="display: none;">
                    <ul>
                        <li>{{ __('vip.benefit_list.gold.1') }}</li>
                        <li>{{ __('vip.benefit_list.gold.2') }}</li>
                        <li>{{ __('vip.benefit_list.gold.3') }}</li>
                    </ul>
                </div>
            </div>
            <div class="expandableBlock">
                <div class="expandableBlockHeader">
                    <svg><use href="#vip-platinum"></use></svg>
                    {{ __('vip.rank.4') }}
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="expandableBlockContent" style="display: none;">
                    <ul>
                        <li>{{ __('vip.benefit_list.platinum.1') }}</li>
                        <li>{{ __('vip.benefit_list.platinum.2') }}</li>
                        <li>{{ __('vip.benefit_list.platinum.3') }}</li>
                    </ul>
                </div>
            </div>
            <div class="expandableBlock">
                <div class="expandableBlockHeader">
                    <svg><use href="#vip-diamond"></use></svg>
                    {{ __('vip.rank.5') }}
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="expandableBlockContent" style="display: none;">
                    <ul>
                        <li>{{ __('vip.benefit_list.diamond.1') }}</li>
                        <li>{{ __('vip.benefit_list.diamond.2') }}</li>
                        <li>{{ __('vip.benefit_list.diamond.3') }}</li>
                        <li>{{ __('vip.benefit_list.diamond.4') }}</li>
                    </ul>
                </div>
            </div>
        </div>
   


</div>
        <div data-wallet-tab-content="vip-bonus">
        <div class="modal-scrollable-content" >

            <div class="vip_bonus_content"></div>

        </div>
    </div>
        </div>
    </div>
</div>
</div>
</div>
