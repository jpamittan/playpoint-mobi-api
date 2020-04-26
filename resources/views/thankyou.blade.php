@extends('layouts.main') 
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ibox-content">
                <h1>{{__('Thank you for your email. It has veen send.')}}</h1>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Main -->
@include('footer.'.App::getLocale())
@endsection

@section('scripts')
@endsection
