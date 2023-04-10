<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/revslider.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.mobile-menu.min.js"></script>
<script src="js/countdown.js"></script>
<script src="vendor/toastr/js/toastr.min.js" type="text/javascript"></script>
<script src="js/toastr-init.js"></script>

<script>
    jQuery(document).ready(function () {
        jQuery('#thm-rev-slider').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 0,
            startheight: 750,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'on',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'on',
            forceFullWidth: 'off',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
<script>
    function HideMe() {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
</script>
<!-- Hot Deals Timer 1-->

<script>
    function change_image() {
        document.getElementById('menu_icon').style.display = 'none';
        document.getElementById('menu_icon_cross').style.display = 'block';
    }

    function change_image_rep() {
        document.getElementById('menu_icon').style.display = 'block';
        document.getElementById('menu_icon_cross').style.display = 'none';
    }
</script>