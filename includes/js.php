    <!------ javascripts --------->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Hero Slider -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="js/hero-slider.js"></script>


    <!-- navbar -->

<!--NAVBAR-->
<script src="js/navbar.js"></script>


<script>
    $(document).ready(function(){


        $(window).scroll(function(event){

            var y_cordinate = $(this).scrollTop();

            var simple = $('.responsive').position();
            var advance = $('.advance').position();

            var simpleht = $('.responsive').height();
            var advanceht = $('.advance').height();


            if(y_cordinate >= (simple.top - simpleht)){
                $('.responsive img').addClass('animate');
            }else{
                $('.responsive img').removeClass('animate');
            }

            if(y_cordinate >= (advance.top - advanceht )){
                $('.advance img').addClass('animate');
            }else{
                $('.advance img').removeClass('animate');
            }

        });

    })
</script>

<!--Moise-pointer-->
<script>
    const cursor = document.querySelector('.cursor');

    document.addEventListener('mousemove', e => {
        cursor.setAttribute("style", "top: " + (e.pageY - 10) + "px; left: " + (e.pageX - 10) + "px;")
    });

    document.addEventListener('click', e => {
        cursor.classList.add("expand");
        setTimeout(() => {
            cursor.classList.remove("expand");
        }, 500);
    });
</script>

<!-- Wow Animation -->
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>


<!-- Button -->
<script>
    var animateButton = function(e) {

e.preventDefault;
//reset animation
e.target.classList.remove('animate');

e.target.classList.add('animate');
setTimeout(function(){
  e.target.classList.remove('animate');
},700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
bubblyButtons[i].addEventListener('click', animateButton, false);
}
</script>

<!--COUNT-->
<script src="js/count.js"></script>

<!-- Testimonial -->
<script src="js/testimonial.js"></script>

<!-- Lightbox -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'>

    <script>    
    $('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
    </script>