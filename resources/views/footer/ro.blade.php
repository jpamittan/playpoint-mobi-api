<!-- Start Footer -->
<footer>
    <div class="container">
    <div class="row">
         <div class="col-xs-12"><p class="terms">Serviciul Playpoint ofera jocuri si alte continuturi si poate fi folosit prin abonarea prin SMS. Apasand pe CONTINUA veti fi redirectionat catre casuta de mesaje de unde puteti incepe procesul de abonare - cost mesaj trimis la 1280: 0.05EUR+TVA. Abonarea se face in mai multi pasi: prin trimiterea prin SMS a cuvantului cheie PLAY la 1280, urmata de confirmarea abonarii prin SMS la 1280. Costul abonamentului este de 1.50E+TVA/sms primit/3 zile in Orange, Vodafone,Telekom. Taxarea se face in Vodafone de pe numarul 23120 iar in Telekom de pe numarul 22281. Abonamentul se incheie pe o perioada nedeterminata (pana la dezabonare). Pentru dezabonare trebuie sa trimiteti STOP PLAY la 1280 (0.05E+TVA/sms trimis) sau contactati furnizorul serviciului la adresa rootech.ro@silverlines.info sau prin numarul de telefon  0040318262751 , orar luni-vineri 9:00-18:00. Prin activarea serviciului utilizatorul este de acord neconditionat cu acesti termeni si conditii ai serviciului si confirma ca are acordul titularului legal al cartelei SIM pentru comandarea acestuia. Furnizor serviciu: Root Technologies B.V, Damstraat 2, 4001 KZ - Tiel, The Netherlands.</p></div>
        <div class="col-xs-12">
        <ul class="footer-menu">
            <li><a href="/contact">{{__('Contact Us')}}</a></li>
            <li>|</li>
            <li><a href="/tos">{{__('General terms and conditions')}}</a></li>
            <?php if ( App::getLocale()!='sr'){?>
            <li>|</li>
            <li><a href="/privacy">{{__('Privacy Policy')}}</a></li>

            <?php }else{?>
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