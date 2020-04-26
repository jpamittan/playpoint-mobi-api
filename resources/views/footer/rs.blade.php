<!-- Start Footer -->
<footer>
    <div class="container">
    <div class="row">
         <div class="col-xs-12"><p class="terms">Ovo je pretplatnički servis. Usluga kosta 360 DIN/nedeljno (plus cena osnovnog SMSa: MTS 3,60 DIN, Telenor 3,60 DIN, Vip 3,48 DIN). Pretplata na uslugu ce biti automatski obnavljana sve dok ne posaljete STOPOK (Telekom) i STOP OK (VIP i Telenor) na 1554. Molimo da proverite da Vaš telefon ima ispravno podešene wap postavke. Vaš operater može Vam zaračunati dodatne SMS/WAP/3G troškove. Kliknite ovde da biste videli Opšte uslove koji se primenjuju. Registracijom na ovu uslugu potvrđujete da ste saglasni sa svim važećim odredbama i uslovima Playpoint, da ste stanovnik Srbije, da imate 18 ili više godina i da ste vlasnik mobilnog uređaja ili imate saglasnost vlasnika. Playpoint nije povezan, sponzorisan niti odgovara za bilo koji od navedenih proizvoda. Robne marke, servisi i logotipi su vlasništvo njihovih vlasnika. Svi testovi, igre i/ili aplikacije na ovoj stranici su u svrhu zabave. Za dodatne informacije pozovite Playpoint na +381113216815 ili pošaljite e-mail na rootech.rs@silverlines.info. Ovu uslugu nudi vam Root Technologies B.V, Damstraat 2, 4001 KZ Tiel, Nederland. Tehnički pružalac usluge NTH Media d.o.o., Beograd</p></div>
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