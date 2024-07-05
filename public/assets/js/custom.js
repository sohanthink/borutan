$(".recent_slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    speed: 500,
    slidesToShow: 5,
    slidesToScroll: 1,
     prevArrow:'<span class="recent_icon recent_slider_right absolute z-50 object-right">&#8594;</span>',
     nextArrow:'<span class="recent_icon recent_slider_left absolute z-50 object-left">&#8592;</span>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});
