
<div class="modal-body js-cookie-consent cookie-consent">
  <div class="">

      <span class="cookie-consent__message">
          {!! trans('cookieConsent::texts.message') !!}
      </span>
  <br/>
      <button class="js-cookie-consent-agree cookie-consent__agree">
          {{ trans('cookieConsent::texts.agree') }}
      </button>
      <button class="js-cookie-consent-agree" type="button" onclick="close_window()"  data-dismiss="modal">I don't agree</button>
  </div>
</div>
  