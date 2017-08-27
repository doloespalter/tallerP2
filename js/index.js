$(document).ready(
        function () {
    
            $('.picGallery').slick({
                    slidesToShow: 1,
                    arrows: true,      
                    adaptiveHeight: true,
                    prevArrow: '<img class="slick-prev" src="./imagenes/back.png" style="display: block;height: 66px;position: absolute; margin-top: 18%; margin-left: 0%; z-index:2;" />',
                    nextArrow: '<img class="slick-next" src="./imagenes/next.png" style="display: block;height: 66px;position: relative; margin-top: -26.3%; margin-left: 89%; z-index:2;"/>'
                });
                
                
        }   
);