<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Error {{ $code ?? -1 }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('general.head.description') }}">

        <meta property="og:description" content="{{ __('general.head.description') }}" />
        <meta property="og:image" content="{{ asset('/img/logo/logo_temp.png') }}" />
        <meta property="og:image:secure_url" content="{{ asset('/img/logo/logo_temp.png') }}" />
        <meta property="og:image:type" content="image/svg+xml" />
        <meta property="og:image:width" content="295" />
        <meta property="og:image:height" content="295" />

        <link rel="icon" href="{{ asset('/img/logo/logo_temp.png') }}">
        <link rel="stylesheet" href="{{ mix('/css/pages/error.css') }}">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

<!------ Include the above in your HEAD tag ---------->

    <section class="error_section">
      
        <p class="error_section_subtitle alert alert-danger" style="font-size: 0.82rem; font-weight: 600;">{{ $code ?? -1 }}</p>
        <br>
        <p class="error_section_subtitle alert-light p-2" style="border-radius: 8px;">{{ $desc ?? 'An error has occurred' }}   <a href="{{ \App\Settings::where('name', 'telegram_link')->first()->value }}" class="alert alert-info p-4" style="font-size: 0.85rem; font-weight: 600;">Telegram</a></p>
    </section>                            

