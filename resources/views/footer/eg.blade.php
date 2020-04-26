<!-- Start Footer -->
<footer>
    <div class="container">
    <div class="row">
         <div class="col-xs-12"><p class="terms"></p></div>
        <div class="col-xs-12">
        <ul class="footer-menu">
            <li><a href="/contact">{{__('Contact Us')}}</a></li>
            <li>|</li>
            <li><a href="/tos">{{__('General terms and conditions')}}</a></li>
            <?php if ( App::getLocale()!='sr'){?>
            <li>|</li>
            <li><a href="/privacy">{{__('Privacy Policy')}}</a></li>

            <?php }?>
            <?php if ( App::getLocale()!='EG'){ ?>
                <li>|</li>
            <li><a href="/cancel">{{__('Cancel Abonnement')}}</a></li>
            <?php }?>
        </ul>
        </div>
        <div class="col-xs-12">
        <p>{{__('Play the best online mobile games on your phone or tablet.')}}</p>
        </div>
        <div class="col-xs-12">
        <p>Copyright © 2018 PlayPoint</p>
        </div>
    </div>
    </div>
</footer>
<!-- End Footer -->