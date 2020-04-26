@extends('layouts.main')
@section('content')
<main>
    <div class="container">
        <section>
            <div class="row">
            @if(Session()->get('direction')=="ltr")
                <div class="col-xs-8"><img src="/images/games-icon.png" alt="" class="icon-title"><h3>{{__('Spotlight')}}</h3></div>
                <div class="col-xs-4 text-right"> <!--<button type="button" class="btn btn-cta-small">{{__('See more')}}</button>--></div>
           @else
                <div class="col-xs-4 text-left"> <!--<button type="button" class="btn btn-cta-small">{{__('See more')}}</button>--></div>
                <div class="col-xs-8 text-right"><h3>{{__('Spotlight')}}<img src="/images/games-icon.png" alt="" style="float:right; padding-left:5px; padding-right:0px;" class="icon-title"></h3></div>
           @endif
           </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="owl-carousel owl-theme" id="spotlight">
                        <?php $i=1;?>
                        @foreach($spotlights as $game)
                            <div class="item">
                                <div class="product-items box">
                                    <figure>
                                        @if($game->location=="local")
                                        <img src="{{env('CDN_URL')}}{{$game->content_code}}/{{$game->featured_image}}" alt="{{$game->name}}" class="img-responsive">
                                        @else
                                        <img src="{{$game->featured_image}}" alt="{{$game->name}}" class="img-responsive">
                                        @endif
                                        <figcaption>
                                            <ul>
                                                <li><a href="/{{app()->getLocale()}}/detail/{{$game->id}}"><i class="fa fa-eye fa-3x"></i></a></li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <h4 class="box1">{{$game->name}}</h4>
                                    <div class="star-rating">
                                        <?php $rnd = rand(4,7);
                                        for ($x=1; $x <6; $x++) {
                                            if ($x<$rnd){
                                                echo "<span class=\"fa fa-star\" data-rating=\"{$x}\"></span>";

                                            }else{
                                                echo "<span class=\"fa fa-star-o\" data-rating=\"{$x}\"></span>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @foreach($byTags as $tag=>$byTag)
        <section>
            <div class="row">
            @if(Session()->get('direction')=="ltr")
                <div class="col-xs-8"><img src="/images/games-icon.png" alt="" class="icon-title"><h3>{{__($tag)}}</h3></div>
                <div class="col-xs-4 text-right"> <a href="/{{app()->getLocale()}}/tags?tag={{trim($tag)}}" class="btn btn-cta-small">{{__('See more')}}</a></div>
           @else
                <div class="col-xs-4 text-left"> <a href="/{{app()->getLocale()}}/tags?tag={{trim($tag)}}" class="btn btn-cta-small">{{__('See more')}}</a></div>
                <div class="col-xs-8 text-right"><h3>{{__($tag)}}<img src="/images/games-icon.png" alt="" style="float:right; padding-left:5px; padding-right:0px;" class="icon-title"></h3></div>
           @endif
           </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="owl-carousel owl-theme" id="{{trim(str_replace(" ","_",$tag))}}">
                        @foreach($byTag as $game)

                            <div class="item">
                                <div class="product-items box">
                                    <figure>
                                        @if($game->location=="local")
                                        <img src="{{env('CDN_URL')}}{{$game->content_code}}/{{$game->featured_image}}" alt="{{$game->name}}" class="img-responsive">
                                        @else
                                        <img src="{{$game->featured_image}}" alt="{{$game->name}}" class="img-responsive">
                                        @endif
                                        <figcaption>
                                            <ul>
                                                <li><a href="/{{app()->getLocale()}}/detail/{{$game->id}}"><i class="fa fa-eye fa-3x"></i></a></li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <h4 class="box1">{{$game->name}}</h4>
                                    <div class="star-rating">
                                        <?php $rnd = rand(4,7);
                                        for ($x=1; $x <6; $x++) {
                                            if ($x<$rnd){
                                                echo "<span class=\"fa fa-star\" data-rating=\"{$x}\"></span>";

                                            }else{
                                                echo "<span class=\"fa fa-star-o\" data-rating=\"{$x}\"></span>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endforeach

    </div>
</main>
@include('footer.'.App::getLocale())
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    $('#spotlight').owlCarousel({
        loop: true,
        margin: 10,
        <?php if(Session()->get('direction')=="ltr"){echo "rtl:false,";}else{echo "rtl:true,";}; ?>
        responsiveClass: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 2,
                dots: false,
                nav: true
            },
            600: {
                items: 4,
                dots: false,
                nav: true
            },
            1000: {
                items: 6,
                dots: false,
                nav: true,
                loop: false,
                margin: 20,
            }
        }
    })
    @foreach($byTags as $tag=>$byTag)
    $('#{{trim(str_replace(" ","_",$tag))}}').owlCarousel({
        loop: true,
        margin: 10,
        <?php if(Session()->get('direction')=="ltr"){echo "rtl:false,";}else{echo "rtl:true,";}; ?>
        responsiveClass: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 2,
                dots: false,
                nav: true
            },
            600: {
                items: 4,
                dots: false,
                nav: true
            },
            1000: {
                items: 6,
                dots: false,
                nav: true,
                loop: false,
                margin: 20,
            }
        }
    })
    @endforeach
 })
</script>
@endsection
