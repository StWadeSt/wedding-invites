
$(window).on("load", function(){

    $('.nav-link').click(function(){$('.navbar-collapse').collapse('hide');});
    $('body').click(function(){$('.navbar-collapse').collapse('hide');});

    let slideIndex = $(".slide.active").index();
    const slideLength = $('.slide').length;

    function slideShow(){

        $(".slide").removeClass("active").eq(slideIndex).addClass("active");
        if(slideIndex == slideLength-1){
            slideIndex = 0;
        }else{
            slideIndex++;
        }
        setTimeout(slideShow,5000);
    }
    slideShow()

    const wHeight = $(window).height();
    $('.gallery-popup img').css('max-height', wHeight + 'px');

    let itemIndex = 0;
    const totalGalleryItems = $(".gallery-item").length;

    $(".gallery-item").click(function(){
        itemIndex = $(this).index();
        $(".gallery-popup").addClass("open");
        $(".gallery-popup .gp-img").hide();
        gpSlideShow();
    })

    $(".gp-controls .next").click(function(){

        if (itemIndex == (totalGalleryItems - 1)) {
            itemIndex = 0;
            $(".gallery-popup .gp-img").fadeOut(function(){
                gpSlideShow();
            });
        }
        else{
            itemIndex++;
            $(".gallery-popup .gp-img").fadeOut(function(){
                gpSlideShow();
            });
        }
    })

    $(".gp-controls .prev").click(function(){

        if (itemIndex < 1) {
            itemIndex = (totalGalleryItems - 1);
            $(".gallery-popup .gp-img").fadeOut(function(){
                gpSlideShow();
            });
        }
        else{
            itemIndex--;
            $(".gallery-popup .gp-img").fadeOut(function(){
                gpSlideShow();
            });
        }
    })

    function gpSlideShow(){
        const imgSrc = $(".gallery-item").eq(itemIndex).find('img').attr("data-large")
        $(".gallery-popup .gp-img").fadeIn().attr('src', imgSrc);
        $(".gp-counter").text((itemIndex + 1) +"/"+ totalGalleryItems);
        $(".gp-close").click(function(){
            $(".gallery-popup").removeClass("open");
        })

    }

    // Countdown section 
    
    const weddingDate = new Date('Dec 10, 2022 13:00:00').getTime();

    myTimer = setInterval(function(){calculateTimeLeft(weddingDate)}, 1000);

    function clearTimer(){
            clearInterval(myTimer);
    }

    function calculateTimeLeft(then){
        //this line is getting the current time and date
        var now = new Date().getTime();
        //this line is getting the difference(gap) between now and the selected holiday
        var gap = then - now;
    
        var seconds = 1000;
        var minutes = seconds* 60;
        var hours = minutes * 60;
        var days = hours * 24;
    
        var d = Math.floor(gap/(days));
        var h = parseInt(Math.floor(gap % (days))/ (hours));
        var m = parseInt(Math.floor(gap % (hours))/ (minutes));
        var s = parseInt(Math.floor(gap % (minutes))/ (seconds));
        
        document.getElementById('day').innerText = d;
        document.getElementById('hour').innerText = h;
        document.getElementById('minute').innerText = m;
        document.getElementById('second').innerText = s;
    
    }
})

$(document).ready(function(){

    // Filtering between Bridesmaids and Groomsmen
    filterPeople($(".filter-btn.active").attr("data-target"))
    function filterPeople(target){
        $('.filter-btn').removeClass('active');
        $(".filter-btn[data-target='"+target+"']").addClass('active');
        $('.people-item').hide();
        $('.people-item[data-category="'+target+'"]').fadeIn();
    }

    $('.filter-btn').click(function(){
        if (!$(this).hasClass('active')) {
            filterPeople($(this).attr("data-target"))
        }
    })
})