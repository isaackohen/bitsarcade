<?php

return [
    'rank' => [
        'level' => 'VIP level - :level',
        '0' => 'New Player',
        '1' => 'Bronze',
        '2' => 'Silver',
        '3' => 'Gold',
        '4' => 'Platinum',
        '5' => 'Diamond'
    ],
    'description' => 'Your VIP level is calculated by your wager in your most wagered currency.',
    'benefits_description' => 'VIP benefits:',
    'benefits' => 'Benefits',
    'benefit_list' => [
        'bronze' => [
            '1' => 'Daily Bonus unlocked',
            '2' => 'Access to VIP promocodes',
            '3' => 'VIP role on the Discord server',
            '4' => 'Get 25 Free Slot Spins'
        ],
        'silver' => [
            '1' => 'Code activation limit per day is increased from 2 to 3',
            '2' => 'Increased Daily Bonus',
            '3' => 'Get 25 Free Slot Spins'
        ],
        'gold' => [
            '1' => 'VIP codes do not affect the overall activation limit of promotional codes',
            '2' => 'Increased Daily Bonus',
            '3' => 'Get 50 Free Slot Spins'
        ],
        'platinum' => [
            '1' => 'The required amount for withdrawal is reduced by 2 times',
            '2' => 'Increased Daily Bonus',
            '3' => 'Get 75 Free Slot Spins'
        ],
        'diamond' => [
            '1' => 'Your withdrawals have a higher priority in the queue',
            '2' => 'Code activation limit now resets every 12 hours',
            '3' => 'Increased Daily Bonus',
            '4' => 'Get 200 Free Slot Spins'
        ]
    ],
    'bonus' => [
        'tooltip' => 'Daily VIP Bonus',
        'title' => 'Daily Bonus',
        'progress_title' => 'Progress',
        'description' => "As a reward for being VIP. you get a Daily bonus. Each bet unlocks 0.1% of your Daily Bonus.<br>
                          <br>The total size of which is determined by your VIP status. Once you have reached<b>Bronze</b> level (after wagering 500$) you can use the Daily Bonus feature indefinitely.<br>
                          <br>You can withdraw your Daily bonus at any time, but keep in mind that after this you will not be able to receive this bonus for the rest of the day.
                          <br><br>We reset bonus progress every day at midnight. Remember to take the reward before midnight!",
        'timeout' => "<br><strong>You have already received the bonus.</strong><br>Come back tomorrow!<br><br>"
    ]
];
