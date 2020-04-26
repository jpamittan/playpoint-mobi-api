@extends('layouts.main') 
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>{{__('Cancel Abonnement')}}ل</h1>
                @if ($canceled!=true)
                <p class="cta">ادخل رمز التعريف الشخصي</p>
                    <form method="POST" id="landing-form">
                        @csrf
                        <div id="errorMsg" class="error">{{$error}}</div>
                        <input id="msisdn-input" name="pin" value="" size="9" autofocus="" placeholder="ادخل رمز التعريف هنا"><br/>&nbsp;<br/>
                        <center><input type="submit" class="btn btn-cta" name="select" value="شغل الآن"></center><br/>
                        <center><a href="#" id="resendPin">عادة إرسال رمز التعريف</a></center>

                    </form>
                @else
                <h2>You subscription has been canceled</h2>
                @endif
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
