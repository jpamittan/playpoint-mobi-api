<!-- Start Footer -->
<footer>
    <div class="container">
    <div class="row">
         <div class="col-xs-12"><p class="terms"></p></div>
        <div class="col-xs-12">
        <ul class="footer-menu">
            <li><a href="{{ route('contact', app()->getLocale()) }}">{{__('Contact Us')}}</a></li>
            <li>|</li>
            <li><a href="{{ route('tos', app()->getLocale()) }}">{{__('General terms and conditions')}}</a></li>
            <li>|</li>
            <li><a href="{{ route('privacy', app()->getLocale()) }}">{{__('Privacy Policy')}}</a></li>
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