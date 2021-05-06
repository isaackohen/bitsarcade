<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Bets.sh Demo</title>
<?php
echo '<meta http-equiv="refresh" content="0"/>';
header("Refresh:1");

?>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="0"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('/img/logo/ico.png') }}">
        <link rel="stylesheet" href="{{ mix('/css/pages/error.css') }}">
<style>
body {
  font-family: 'Trebuchet MS', sans-serif;
}
</style>
    </head>

<!------ Include the above in your HEAD tag ---------->

    <section class="error_section">
        <br>     
        <br>
        <p style="color: #fff; font-size: 0.85rem; font-weight: 600;">Moment..</p>
        <br>     
        <br>
        <br>     
        <br>
        <img src="/img/logo/logo_bits_small_content.png"> 
                <small style="font-size: 0.65rem;">📨 start@bets.sh
📯 t.me/isaac_kohen</small>
    </section>                            

