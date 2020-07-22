    //modal, element only load 1 times
    var isExists = sessionStorage.getItem("pageloadcount");
    if (isExists == null ) {
        sessionStorage.setItem("pageloadcount", 1);
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        setTimeout(function(){ 
            modal.style.display = "block";
        }, 300);
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
    //end modal

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    var height = document.getElementById("vid").style.height;    
    if (document.body.scrollTop > height || document.documentElement.scrollTop > height) {
        document.getElementById("h").style.padding = "10px";
        document.getElementById("h").style.backgroundColor = " rgb(133, 133, 133) ";
        document.getElementById("h").style.boxShadow = "0px 6px 5px 3px rgba(0, 0, 0, 0.281);";
    } else { 
        document.getElementById("h").style.padding = "25px";
        document.getElementById("h").style.backgroundColor = "rgb(255, 255, 255)";
        document.getElementById("h").style.boxShadow = "none";
        }
    }
    $(document).ready(function(){
        $("#toTop").click(function(){
            $("html").scrollTop(0);
        });

        $(window).scroll( function(){
            $('.scrollToTop').toggleClass('toTop-scrolled', $(this).scrollTop() > $('#vid').height()-100 );
        });
        $('.slick').slick({
            dots: true,
            infinite: true,
            //autoplay: true,
            //autoplaySpeed: 2000,
        });
        AOS.init({
        duration: 800,
        once: true
        });
    }); 