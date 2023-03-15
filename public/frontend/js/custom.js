jQuery('.tabs-sliderlg').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1400,
            settings: {
              slidesToShow: 5,
            }
          },
        {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
            }
          },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 599,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 479,
          settings: {
            slidesToShow: 1,
          }
        }
    ]
});

// fragrances slider
jQuery('.fragrances').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [

        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
            }
          },
        {
          breakpoint: 599,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 479,
          settings: {
            slidesToShow: 1,
          }
        }
    ]
});


// home decor slider

$('.home-decor-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    arrows: false,
    dots: false,
    speed: 300,
    centerPadding: '20px',
    infinite: true,
    autoplaySpeed:2000,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

