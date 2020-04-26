@extends('layouts.main')
@section('content')
<main>
    <div class="container">
    <section>
		    <div class="row">
            @if(Session()->get('direction')=="ltr")
                <div class="col-xs-12"><img src="/images/games-icon.png" alt="" class="icon-title"><h3>{{__($tags)}}</h3></div>
            @else
                <div class="col-xs-12 text-right"><h3>{{__($tags)}}<img src="/images/games-icon.png" alt="" style="float:right; padding-left:5px; padding-right:0px;" class="icon-title"></h3></div>
            @endif
		    </div>
            <div class="row">
                @foreach($taggames->data as $game)
                @if(Session()->get('direction')=="ltr")
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" style="float:left;">
                @else
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6" style="float:right;">
                @endif
                    <div class="product-items category-list box">
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

		    <div class="row">
			<div class="col-xs-12 text-center">
			    <nav aria-label="Page navigation">
				<ul class="pagination">
                @if(Session()->get('direction')=="ltr")
                    @if ($taggames->current_page==1)
                        <li>
                                <i class="fa  fa-angle-left hidden" aria-hidden="true"></i>
                        </li>
                    @else
                        <li>
                            <a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$taggames->current_page-1}}" aria-label="Previous">
                                <i class="fa  fa-angle-left" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $taggames->last_page; $i++)
                        @if ($i == $taggames->current_page)
                            <li class="active"><a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$i}}">{{$i}}</a></li>
                        @else
                            <li ><a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$i}}">{{$i}}</a></li>
                        @endif
                    @endfor
                    @if ($taggames->current_page<$taggames->last_page)
                        <li>
                            <a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$taggames->current_page+1}}" aria-label="Next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    @else
                        <li>
                                <i class="fa fa-angle-right hidden" aria-hidden="true"></i>
                        </li>

                    @endif
                @else
                    @if ($taggames->current_page<$taggames->last_page)
                        <li>
                            <a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$taggames->current_page+1}}" aria-label="Next">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                        </li>
                    @else
                        <li>
                                <i class="fa fa-angle-left hidden" aria-hidden="true"></i>
                        </li>

                    @endif

                    @for ($i = $taggames->last_page; $i >=1 ; $i--)
                        @if ($i == $taggames->current_page)
                            <li class="active"><a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$i}}">{{$i}}</a></li>
                        @else
                            <li ><a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$i}}">{{$i}}</a></li>
                        @endif
                    @endfor
                    @if ($taggames->current_page==1)
                        <li>
                                <i class="fa  fa-angle-right hidden" aria-hidden="true"></i>
                        </li>
                    @else
                        <li>
                            <a href="/{{app()->getLocale()}}/tags?tag={{$rawtags}}&page={{$taggames->current_page-1}}" aria-label="Previous">
                                <i class="fa  fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endif
                @endif

				</ul>
			    </nav>
			</div>
		    </div>
		</section>

    </div>
</main>
@include('footer.'.App::getLocale())
@endsection
@section('scripts')
@endsection
