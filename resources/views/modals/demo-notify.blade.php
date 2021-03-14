<div class="demo-notify modal">
    <div class="content">
        <i class="fas fa-close-symbol"></i>
        <div class="ui-blocker" style="display: none;">
            <div class="loader"><div></div></div>
        </div>

        <div class="heading">{{ __('general.demo.title') }}</div>
        <div class="text-center mt-4 mb-4">{{ __('general.demo.description') }}</div>
        <button class="btn btn-primary btn-block" onclick="$.modal('demo-notify', 'hide'); $.register();">{{ __('general.demo.register') }}</button>
    </div>
</div>
