// Initialize Tootlips and Popovers
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

//Navbar Box Shadow on Scroll 
$(function () {
    var navbar = $('.navbar');
    $(window).scroll(function () {
        if ($(window).scrollTop() <= 40) {
            navbar.css('box-shadow', 'none');
        } else {
            navbar.css('box-shadow', '0px 3px 2px rgba(0, 0, 0, 0.2)');
        }
    });
})

/***************** Height ******************/

$('.box').matchHeight();
$('.box1').matchHeight();
$('.box2').matchHeight();
/*
var $star_rating = $('.star-rating .fa');

var SetRatingStar = function () {
    return $star_rating.each(function () {
        if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
        } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
        }
    });
};

$star_rating.on('click', function () {
    var container = jQuery(this).parent('.star-rating');
    var ratings = container.find('input.rating-value');
    ratings.val($(this).data('rating'));
    return SetRatingStar();
});

SetRatingStar();
$(document).ready(function () {

});
*/

$(document).ready(function () {
    $('#games').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
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
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
            }
        }
    })
})

$(document).ready(function () {
    $('#apps').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
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
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
            }
        }
    })
})

$(document).ready(function () {
    $('#videos').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
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
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
            }
        }
    })
})

$(document).ready(function () {
    $('#wallpapers').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
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
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
            }
        }
    })
})