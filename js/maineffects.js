/*jslint browser: true*/
//global $, jQuery, alert
$('.masonry').imagesLoaded(function () {
            new Masonry('.masonry',{
                itemSelector: '.item',
                horizontalOrder: true
            })
        });
$(document).ready(function () {
    var mySwiper = new Swiper('.swiper-container', {
        //direction: 'vertical',
        loop: true,
        autoplay : 3000,
        grabCursor : true,
        // 如果需要分页器
        pagination: '.swiper-pagination',
        slidesPreview: 1,
        paginationClickable: true,
        // 如果需要前进后退按钮
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        keyboardControl: true
        // 如果需要滚动条
        //scrollbar: '.swiper-scrollbar'
    });
    var active_id="";
    var navbar=$('.navbar-fixed-top');
    var docm=$(document);
    var ticking = false; // rAF 触发锁
    var menuopac=false;
    function resNav () {
        ticking = false;
        /*console.log("Success");*/
        if(docm.scrollTop()<150&&menuopac){
            navbar.css("box-shadow","0 0 0 0");
            navbar.css("background-color","transparent");
            menuopac=false;
        }
        else if(docm.scrollTop()>300&&!menuopac) {
            navbar.css("box-shadow","0 4px 8px 0 rgba(7, 17, 27, .1)");
            navbar.css("background-color","#fff");
            menuopac=true;
        }
    }
    function onScroll(){
        if(!ticking) {
            requestAnimationFrame(resNav);
            ticking = true;
        }
    }
// 滚动事件监听
    window.addEventListener('scroll', onScroll, false);

});
