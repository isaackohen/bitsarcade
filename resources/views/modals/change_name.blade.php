<div class="change_name modal">
    <div class="content" style="min-height: unset !important;">
        <i class="fas fa-close-symbol"></i>
        <div class="ui-blocker" style="display: none;">
            <div class="loader"><div></div></div>
        </div>

        <input class="mt-4 mb-4" type="text" id="new-name" placeholder="{{ __('general.profile.new_name') }}">
        <button class="btn btn-primary mr-2" id="change-name-btn">{{ __('general.change') }}</button>
        <button class="btn btn-secondary" onclick="$.modal('change_name')">{{ __('general.cancel') }}</button>
    </div>
</div>

