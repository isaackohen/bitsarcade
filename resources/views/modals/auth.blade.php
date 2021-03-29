	{!! NoCaptcha::renderJs() !!}
<div
  class="auth modal fade "
  id="auth modal"
  tabindex="-1"
    style="display: block; padding-right: 15px;"
  aria-labelledby="auth modal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('general.auth.login') }}</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="auth modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="ui-blocker" style="display: none;">
            <div class="loader"><div></div></div>
        </div>

        <div class="alert alert-info mb-0 p-2 text-center" role="alert"><p class="mb-1">Make sure to set your recovery e-mail on profile.</p>
        </div>
        <div class="divider">
            <div class="line"></div>
            {{ __('general.auth.through_login') }}
            <div class="line"></div>
        </div>

<div class="input form-outline form-white mt-3 mb-3">
  <input type="text" id="login" class="form-control form-control-lg" />
  <label class="form-label" style="color: #ffffff8a;" for="formControlLg">Display Name</label>
</div>

<div class="input form-outline form-white mt-3 mb-3">
  <input type="password" id="password" class="form-control form-control-lg" />
  <label class="form-label" style="color: #ffffff8a;" for="formControlLg">Password</label>
</div>
<div style="height: 78px; margin-bottom: 20px;">
                                       {!! NoCaptcha::display(['data-theme' => 'dark'], ['data-callback' => 'recaptchaCallback']) !!}
                                    </div>
        <button class="btn btn-primary btn-block p-2">{{ __('general.auth.login') }}</button>
          <div class="divider">
            <div class="line"></div>
            Other Actions
            <div class="line"></div>
        </div>
        <div class="modal-footer" id="auth-footer" style="display: none">
    <button class="btn btn-secondary w-20 p-2" onclick="$.register()">{{ __('general.auth.register') }}</button>
<a class="btn btn-danger p-2" data-mdb-toggle="collapse" href="#collapseExample" role="button" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-in" aria-expanded="false" aria-controls="collapseExample">
  Lost Access
</a>
        </div>
        <div class="modal-footer" id="register-footer" style="display: none">
<button class="btn btn-secondary w-20 p-2" onclick="$.auth()">{{ __('general.auth.login') }}</button>
<a class="btn btn-danger p-2" data-mdb-toggle="collapse" href="#collapseExample" role="button" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-in" aria-expanded="false" aria-controls="collapseExample">Lost Access</a>

      </div>

      <!-- Collapsed content -->
<div class="collapse mt-1 border border-warning p-3" id="collapseExample">
{{ __('general.auth.recovertext') }} Check out <a href="https://intercom.help/bitsarcade/en/articles/5076599-lost-account-access" target="_blank">lost account</a> article for more info.
</div>
      </div>
    </div>
  </div>
</div>

