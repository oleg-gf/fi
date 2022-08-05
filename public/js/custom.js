
const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },

    effect: 'cube',
    cubeEffect: {
      slideShadows: false,
    },

    loop: true,


  });


$(document).ready(function() {

    let window_size = window.matchMedia('(max-width: 600px)');

    let image_id = 0;

  $(".imagedel-button").click(function () {
    $(".imagedel-modal").show();
    $(".background").show();
    image_id = $(this).closest(".image").attr("name");
  });
  $(".background").click(function () {
    $(".imagedel-modal").hide();
    $(".background").hide();

  });
  $(".no").click(function () {
    $(".imagedel-modal").hide();
    $(".background").hide();

  });
  $(".yes").click(function () {
    $(".imagedel-modal").hide();
    $(".background").hide();
        let url = 'http://' + window.location.host + `/admin/images/` + image_id;

        $.ajax({
          method: "DELETE",
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          dataType: "json",
          success: function (data) {
            console.log( data );
            $(`[name=${image_id}]`).remove();
          },
          error: (xhr, ajaxOptions, thrownError) => {

            console.log(ajaxOptions);


          },
          statusCode: {
            200: function () {
              console.log( "Ok" );
            },
            400: function () {
              console.log( "notOk" );
            }
          }
        });


  });
    $(".navbar-toggler").click(function() {
        if (window_size.matches) {
            $(".violets_sidebar_600").show();
        }
    });


      $('.lightbox').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            disableOn: function() {
                if( $(window).width() < 600 ) {
                  return false;
                }
                return true;
              },
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function(openerElement) {
                  // openerElement is the element on which popup was initialized, in this case its <a> tag
                  // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                  return openerElement.is('img') ? openerElement : openerElement.find('img');
                },
            },
            gallery: {
              enabled: true,

            }
        });
    });
});
