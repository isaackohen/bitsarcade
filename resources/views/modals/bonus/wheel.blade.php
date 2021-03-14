<div class="bonus-side-menu-container">
    <script type="text/javascript">
        window.next = {{ auth()->user()->bonus_claim->timestamp ?? 0 }};
        window.timeout();
    </script>

    <div class="modal-ui-block bonus-wheel-reload" style="display: none">
        <h1>{{ __('general.reload') }}</h1>
        <h3 id="reload"></h3>
    </div>

    <i class="fal fa-times" data-close-bonus-modal></i>
    <h2>{{ __('bonus.wheel.title') }}</h2>

    <div class="wheel"></div>
    <button class="btn btn-primary btn-block mt-2">{{ __('general.spin') }}</button>
</div>
