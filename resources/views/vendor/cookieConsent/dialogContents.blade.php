
<div class="modal-body js-cookie-consent cookie-consent">
    <div class="row">
  <div class="">
    <div class="col-md-8 text-left">
      <span class="cookie-consent__message">
       <h2> We use cookies</h2>
       <p>We use cookies on our website. Some of them are essential, while others help us to improve this website and your experience. Please read our Privacy Policy for more information or select Privacy Preferences to customise your cookies.</p>
       <p>If you are under 16 and wish to give consent to optional services, you must ask your legal guardians for permission.</p>
       <p>We use cookies and other technologies on our website. Some of them are essential, while others help us to improve this website and your experience. Personal data may be processed (e.g. IP addresses), for example for personalized ads and content or ad and content measurement. You can find more information about the use of your data in our privacy policy. You can revoke or adjust your selection at any time under Settings.</p>
          {{-- {!! trans('cookieConsent::texts.message') !!} --}}
      </span>
    </div>
    <div class="col-md-4">
      <button class="js-cookie-consent-agree cookie-consent__agree btn btn-warning mt-4">
          {{ trans('cookieConsent::texts.agree') }}
      </button>
      <button class="js-cookie-consent-agree btn btn-danger mt-4" type="button" onclick="close_window()"  data-dismiss="modal">I don't agree</button>
    </div>
  </div>
</div>
</div>