<div class="auth modal">
    <div class="content">
        <i class="fas fa-close-symbol"></i>
        <div class="ui-blocker" style="display: none;">
            <div class="loader"><div></div></div>
        </div>

        <div class="heading">
            {{ __('general.auth.login') }}
        </div>
        <div class="divider">
            <div class="line"></div>
            {{ __('general.auth.through_social') }}
            <div class="line"></div>
        </div>
        <div class="mt-2">
            <div class="auth-button-group">
                <button class="btn btn-discord w-100" data-social="discord"><i class="fab fa-discord"></i></button>
            </div>
        </div>
        <div class="divider">
            <div class="line"></div>
            {{ __('general.auth.through_login') }}
            <div class="line"></div>
        </div>
        <div class="mt-3 mb-3">
            <input id="login" type="text" placeholder="{{ __('general.auth.credentials.login') }}">
        </div>
        <div class="mt-3 mb-3">
            <input id="password" type="password" placeholder="{{ __('general.auth.credentials.password') }}">
        </div>
        <button class="btn btn-auth-main btn-block p-2">{{ __('general.auth.login') }}</button>
        <div class="auth-footer" id="auth-footer" style="display: none">
             <button class="btn btn-auth w-50 p-1" onclick="$.register()">{{ __('general.auth.create_account') }}</button>
        </div>
        <div class="auth-footer" id="register-footer" style="display: none">
           <button class="btn btn-auth w-50 p-1" onclick="$.auth()">{{ __('general.auth.login') }}</button>

        <div class="alert alert-danger mb-0" role="alert"><p class="mb-1">Make sure to not forget your account details. </p>

            <p class="mb-0"><b>We are unable to recover your password</b> for security reasons.</p>
        </div>
        </div>
    </div>
</div>
