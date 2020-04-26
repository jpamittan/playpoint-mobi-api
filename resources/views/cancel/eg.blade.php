@extends('layouts.main') 
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>{{__('Cancel Abonnement')}}ل</h1>
                <form method="POST" id="landing-form">
                    @csrf
                    <p class="cta1">ادخل رقم هاتفك المحمول</p>
                    <div class="error">{{$error}}</div>
                    <input id="msisdn-input" type="tel" name="msisdn" value="" size="9" autofocus="" placeholder="01" value="01"><br/>&nbsp;<br/>
                    <center><input type="submit" class="btn btn-cta" name="select" value="{{__('Cancel Abonnement')}}"></center>
                </form>
            </div>
        </div>
    </div>
</main>
@include('footer.'.App::getLocale())
@endsection

@section('scripts')
<script>
    jQuery(document).ready(function () {
    });
</script>
@endsection
