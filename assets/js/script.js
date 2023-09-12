$(document).ready(function () {

    // check viewport
    $.fn.isInViewport = function () {
        let elementTop = $(this).offset().top;
        let elementBottom = elementTop + $(this).outerHeight();

        let viewportTop = $(window).scrollTop();
        let viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };


    async function animate() {
        await new Promise(resolve => setTimeout(resolve, 1500));
        $('#toptext').removeClass('foranimate');
    }
    async function animate2() {
        await new Promise(resolve => setTimeout(resolve, 1500));
        $('#bottomtextMobile1').removeClass('w-0');
        $('#bottomtextMobile1').addClass('foranimate3');
    }

    // animation for top text
    $('#toptext').ready(function () {
        $('#toptext').addClass('foranimate');
        animate();
        setTimeout(function () {
            $('#bottomtext').removeClass('w-0');
            $('#bottomtext').addClass('foranimate2');
        }, 1500);
        animate2();
        setTimeout(function () {
            $('#bottomtextMobile1').removeClass('foranimate3');
            $('#bottomtextMobile2').removeClass('w-0');
            $('#bottomtextMobile2').addClass('foranimate3');
        }, 4500);
    });

    // animation for git command panel
    $(window).scroll(function () {
        if ($('#animate3 ').isInViewport()) {
           animate2();
        } else {

            console.log('No success.')
        }
    });
});