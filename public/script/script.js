$(function(){
    companySwiper()
    activeMobileMenu()
    activeNavDepth2()
    setQnabox()
    activePopup()
    clickArrowForText()
    $('img[usemap]').rwdImageMaps();

    $(window).resize(function(){
        sect1TextboxPaddingLeft()
    })
    sect1TextboxPaddingLeft()
})
function sect1TextboxPaddingLeft(){
    const winW = $(window).width()

    if( winW >= 1120 ){
        $('.textbox.main').css({paddingLeft:($(window).width()-1120)/2})
    }else{
        $('.textbox.main').css({paddingLeft:10})
    }
    if( winW < 768 ){
        $('.textbox.main').css({paddingLeft:0})
    }
}

function companySwiper() {
    var swiper = new Swiper(".companySwiper", {
        slidesPerView: 6,
        centeredSlides: false,
        spaceBetween: 40,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay:true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            991: {
                slidesPerView: 6,
            }
        }
    });
}

function activeMobileMenu(){
    $('.btn-menu').on('click', function(){
        $('nav').toggleClass('active')
    })
    $('.btn-close-nav').on('click', function(){
        $('nav').removeClass('active')
    })

    $('nav a').on('click', function(){
        $('nav').removeClass('active')
    })
}

function activeNavDepth2(){
    if( $(window).width() > 767 ){
        $('.isDepth2').on('mouseenter', function(){
            $('.depth2').show()
        })
        $('.depth2').on('mouseleave', function(){
            $('.depth2').hide()
        })
    }else{
        $('.isDepth2').off('mouseenter')
        $('.isDepth2').off('mouseleave')
    }
}


/* move scroll */
function scrollToHash(hash, behavior = "auto") {
    const target = document.querySelector(hash);

    if (target) {
        const targetPosition = target.getBoundingClientRect().top;
        const offsetPosition = targetPosition + window.scrollY - 100;

        window.scrollTo({
            top: offsetPosition,
            behavior: behavior
        });
    }
}
window.addEventListener("hashchange", function() {
    const hash = window.location.hash;
    scrollToHash(hash, "smooth");
});

$(window).load(function(){
    const hash = window.location.hash;

    if (hash){
        scrollToHash(hash);
    }

    const anchors = document.querySelectorAll('a[href^="#"]');

    anchors.forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            e.preventDefault();
            const hash = this.getAttribute("href");
            scrollToHash(hash, "smooth");
        });
    });

    window.addEventListener("scroll", setActiveButton);
    setActiveButton();
});


function setActiveButton() {
    if (!$('#point2').length) return;

    const sections = document.querySelectorAll('[id^="point"]');
    const buttons = document.querySelectorAll('a[href^="#"]');
    const windowHeight = window.innerHeight;
    let maxVisibleRatio = 0;
    let mostVisibleSectionIndex = -1;

    sections.forEach((section, index) => {
        const rect = section.getBoundingClientRect();
        const visibleHeight = Math.min(rect.bottom, windowHeight) - Math.max(rect.top, 0);
        const visibleRatio = visibleHeight / section.clientHeight;

        if (visibleRatio > maxVisibleRatio) {
            maxVisibleRatio = visibleRatio;
            mostVisibleSectionIndex = index;
        }
    });

    buttons.forEach((button, index) => {
        if (index === mostVisibleSectionIndex) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    });
}
/* // move scroll */


function setQnabox(){
    $('.btn-q').on('click', function(){
        const idx = $(this).index()
        $('.btn-q').parent().removeClass('active')
        $(this).parent().addClass('active')
    })
}

function activePopup(){
    $('.btn-showPopup').on('click', function(){
        $('.popup_submit').show()
    })

    $('.popup_submit .closePopup').on('click', function(){
        $('.popup_submit').hide()
    })
}

function clickArrowForText(){
    $('.arrow-down').on('click', function(){
        $(this).siblings('p').show()
        $(this).hide()
    })
}