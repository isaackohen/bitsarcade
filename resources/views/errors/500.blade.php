<head>
    <style>
body {   background: linear-gradient(-225deg, #1A1A1A, #343434);}

</style>
</head>
 <a href="{{ \App\Settings::where('name', 'telegram_link')->first()->value }}" class="alert alert-info m-1 p-4" style="font-size: 0.85rem; font-weight: 600;">Telegram</a>
@include('errors.error', ['code' => 500, 'desc' => 'Error! Trying to refresh..'])
<meta http-equiv="refresh" content="4">