
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body js-cookie-consent cookie-consent">
            <div class="">

                <span class="cookie-consent__message">
                    {!! trans('cookieConsent::texts.message') !!}
                </span>
            <br/>
                <button class="js-cookie-consent-agree cookie-consent__agree">
                    {{ trans('cookieConsent::texts.agree') }}
                </button>
                <button type="button" onclick="close_window()"  data-dismiss="modal">I don't agree</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script type="text/javascript"> 
    function close_window() {
      if (confirm(“Are you sure to close window?”)) {
      close();
      }
      }
        $(window).on('load', function() {
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: true, 
            show: true
        });
    });
</script>
  