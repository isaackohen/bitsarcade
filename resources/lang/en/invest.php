<?php

return [
    'description' => 'Online crypto casino allows its players to play just like other casinos, but also offers the unique feature allowing users to be "The House". By investing in the bankroll, investors earn profits off the loss of other players, this is a great way to "compete" against the players and have an expected return of over 100%.',
    'sidebar' => [
        'stats' => 'Investment Stats',
        'new_investment' => 'New Investment',
        'your_bankroll' => 'Your Bankroll:',
        'your_bankroll_percent' => 'Your Bankroll %:',
        'your_share' => 'Your Share:',
        'your_investing_profit' => 'Your Investing Profit:',
        'site_bankroll' => "Site's Bankroll:",
        'site_profit' => "Site's Profit:",
        'amount' => 'Amount (Min :min)',
        'invest' => 'Invest'
    ],
    'history' => [
        'amount' => 'Investment Amount',
        'your_share' => 'Your Share',
        'profit' => 'Current Amount',
        'status' => 'Status',
        'cancelled' => 'Cancelled',
        'disinvest' => 'Disinvest',
        'dead' => 'Lost'
    ],
    'tabs' => [
        'info' => 'Info',
        'history' => 'History'
    ],
    'info' => [
        '1' => [
            'title' => 'How does it work?',
            'description' => 'Unlike conventional casinos where you bet against a bankroll held solely by the owner. our investors control the bankroll! When a player wins or loses, the bet goes to this public bankroll and generates profits (or losses) for all those who are invested. To keep everything running and fund development, we change a small commission explained in detail below.'
        ],
        '2' => [
            'title' => 'Calculating your share',
            'description' => 'Your share is equal to (Your_Investment / (Global_Bankroll + Your_Investment)) * 100%. If you had 1 BTC invested, and the global bankroll was 99 BTC before you invested, your share would be: (1 / (99 + 1)) * 100% = 1% meaning 1% of all profits and losses would be applied to your investment.'
        ],
        '3' => [
            'title' => 'Calculating profit and loss',
            'description' => 'To determine how much profit or loss you\'d receive from a bet, calculate your share using the formulas above, or with the calculator on the investment tab. Once you have your share, multiply it by any profit or loss. For example, Bob has a 10% share of the bankroll; a player loses 0.25 BTC on his bet. Bob would receive 10% * 0.25 = 0.025 BTC in profits. The formula for profit/loss is Your_Share * Total_Profit = Your_Profit.'
        ],
        '4' => [
            'title' => 'Commissions',
            'description' => 'Commissions are made up of two small fees, the "Invest Commission" and "Disinvest Commission".
                                <br>
                                First, for the Invest Commission. We take a small 1% fee when you make your investment.
                                <br>
                                We also take commission from your investment profits. This will help us fund operations '
        ],
        '5' => [
            'title' => 'Are there any risks to investing?',
            'description' => 'Yes! Like any investment, there exists a chance of loss. you will generally earn a profit, however, if players are luckier than expected, you may have a loss. The longer you stay invested, the greater chance you have of profiting.'
        ]
    ]
];
