@extends('layouts.main') 
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Odjava</h1>

                <p>Za odjavu sa servisa posaljite STOP OK za Telenor i VIP ili STOPOK za Telekom na 1554. Cena odjave servisa je Telekom 5 din, Telenor 5 din, VIP 5 din + VAT. Sav GPRS/WAP promet ce biti naplacen od strane operatora.</p>
            </div>
        </div>
    </div>
</main>
@include('footer.'.App::getLocale())
@endsection

@section('scripts')
@endsection
