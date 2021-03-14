<?php

return [
    'tabs' => [
        'deposit' => 'Deposit',
        'withdraw' => 'Withdraw',
        'history' => 'History',
        'deposits' => 'Deposits',
        'withdraws' => 'Withdraws'
    ],
    'deposit' => [
        'address' => 'Your :currency deposit address',
        'confirmations' => 'Only send :currency to this address, :confirmations confirmation(s) required.'
    ],
    'withdraw' => [
        'address' => '<i class=":icon"></i> :currency Address',
        'amount' => 'Amount (Min :min <i class=":icon"></i>)',
        'button' => 'Withdraw',
        'fee' => 'Your withdrawal will have :fee <i class=":icon"></i> subtracted from your remaining balance to cover the transaction fee.'
    ],
    'history' => [
        'empty' => 'You haven’t ordered anything yet.',
        'name' => 'Currency',
        'sum' => 'Amount',
        'date' => 'Date',
        'status' => 'Status',
        'confirmations' => 'Confirmations',
        'id' => 'ID: :id',
        'paid' => 'Successful',
        'wallet' => 'Address: :wallet',
        'cancel' => 'Cancel',
        'withdraw_cancelled' => 'Payment has been cancelled.',
        'withdraw_status' => [
            'moderation' => 'Moderation',
            'accepted' => 'Successful',
            'declined' => 'Cancelled',
            'reason' => 'Reason:',
            'cancelled' => 'Cancelled by user'
        ]
    ],
    'copy' => 'Copy',
    'copied' => 'Copied!'
];
