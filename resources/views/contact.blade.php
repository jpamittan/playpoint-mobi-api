@extends('layouts.main') 
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ibox-content">
                    <form class="form-horizontal" method='post' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="name-form">
                            <label class="col-sm-2 control-label">
                                                              {{__('First name')}}</label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="surname-form">
                            <label class="col-sm-2 control-label">
                            {{__('Last name')}}</label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" name="surname" id="surname">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="phone-form">
                            <label class="col-sm-2 control-label">
                            {{__('Telephone')}}</label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="email-form">
                            <label class="col-sm-2 control-label">
                            {{__('E-Mail')}}</label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="message-form">
                            <label class="col-sm-2 control-label">
                            {{__('Message')}}</label>
                            <div class="col-sm-10 controls">
                                <textarea class="form-control" name="msg" id="msg"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" id="cancelbtn" type="reset">
                                {{strtoupper(__('Cancel'))}}</button>
                                <button class="btn btn-primary" id="savebtn" type="submit">
                                {{strtoupper(__('Send'))}}</button>
                            </div>
                        </div>                        
                    </form>
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
