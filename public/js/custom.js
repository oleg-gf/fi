

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



  });
$(document).ready(function() {
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
            console.log( data.status );
            $(`[name=${image_id}]`).empty();
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
});