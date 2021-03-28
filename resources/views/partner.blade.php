<div class="container-fluid">
    <div class="row">
        <div class="col vertical-tabs-column">
            <div class="vertical-tabs">
                <div data-toggle-tab="overview" class="option active">
                    {{ __('partner.tabs.overview') }}
                </div>
                @if(!auth()->guest())
                    <div data-toggle-tab="list" class="option">
                        {{ __('partner.tabs.list') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col vertical-tabs-content-column">
            <div class="vertical-tabs-content">
                <div class="tab-content" data-tab="overview">
                    {!! auth()->guest() ? __('partner.overview.guest_content') : __('partner.overview.content', ['id' => auth()->user()->_id]) !!}
                </div>
                @if(!auth()->guest())
                    <div class="tab-content" data-tab="list" style="display: none">
                        <h6><b>Your current referral rake profit:</b></h6>
                        <input id="balance" value="$ {{ auth()->user()->referral_balance_usd ?? 0 }}" disabled type="text">
                        <br>
                        <p>You get paid between 0.09% and 0.15% of each of your referral's wagers. Above 3$ you can payout your referral rake on this page. All payouts are credited instantly to your account in DOGE.</p>

                        @if(auth()->user()->referral_balance_usd >= '3.00')
                            <button class="btn btn-success m-0 p-2" onclick="$.request('/partner_cashout');">Perform Payout in DOGE</button>
                        @else
                        @endif
                        
                        <div>{!! __('partner.analytics.referrals', ['count' => \App\User::where('referral', auth()->user()->_id)->count()])  !!}</div>
                        <div>{!! __('partner.analytics.referrals_bonus', ['count' => count(auth()->user()->referral_wager_obtained ?? [])]) !!}</div>
                        <div>{!! __('partner.analytics.referrals_wheel', ['count' => auth()->user()->referral_bonus_obtained ?? 0]) !!}</div>

                        <div class="divider"></div>
                        <br>
                        <table id="refs" class="table dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('partner.list.name') }}</th>
                                <th>{{ __('partner.list.activity') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\User::where('referral', auth()->user()->id)->get() as $user)
                                    <tr onclick="redirect('/user/{{ $user->_id }}')" style="cursor: pointer">
                                        <td><img alt src="{{ $user->avatar }}" style="width: 32px; height: 32px; margin-right: 5px;"> {{ $user->name }}</td>
                                        @php
                                            $percent = ($user->games() / floatval(\App\Settings::where('name', 'referrer_activity_requirement')->first()->value)) * 100;
                                            if($percent > 100) $percent = 100;
                                            $percent = number_format($percent, 2, '.', '');
                                        @endphp
                                        <td>{{ in_array($user->_id, auth()->user()->referral_wager_obtained ?? []) ? __('general.yes') : __('general.no').' ('.$percent.'%)' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-content" data-tab="analytics" style="display: none">

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
