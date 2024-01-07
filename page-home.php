<?php
/**
 * The template for displaying home page.
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

    <style>

        * {
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
        }

        .backButton {
            position: fixed;
            z-index: 9999;
            bottom: 50px;
            left: 50px;

            background-color: #516285;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 17px;
            color: white;
        }

        .backButton:hover {
            background-color: #687eaa;
            cursor: pointer;
        }

        .background {
            background-color: #bbd2d1;
            height: 100vh;
            width: 100vw;
            object-fit: cover;
            object-position: center;
            position: fixed;
        }

        .background video {
            z-index: 0;
            position: absolute;
            height: 100vh;
            width: 100vw;
            object-fit: cover;
            object-position: center;
        }

        .stall {
            z-index: 1;
            height: 100vh;
            width: 100vw;
            position: fixed;
            object-fit: cover;
            object-position: center;
        }

        .stall img {
            height: inherit;
            width: inherit;
            position: absolute;
            object-fit: cover;
            object-position: center;
        }

        .stall svg {
            height: inherit;
            width: inherit;
            display: block;
            position: absolute;
            object-position: center;
            fill: transparent;
        }

        .stallButton:hover {
            cursor: pointer;
            fill: rgba(255, 255, 255, 0.164);
        }

        .fishButton:hover {
            cursor: pointer;
            fill: rgba(255, 255, 255, 0.35);
        }

        .fishText {
            display: none;
            pointer-events: none;
        }
    </style>

    <div id="primary" <?php astra_primary_class(); ?>>
        <div class="homepage">
            <button id="backButton" class="backButton">Back</button>
            <div id="stall" class="stall">
                <img src="/wp-content/uploads/2024/01/room.png" alt="stall">

                <svg id="stallFrontSvg" viewBox="0 0 1920 1080" width="1920px" height="1080px" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                    <path class="stallButton" id="clickFish" d="m 747.82459,571.54206 -0.80555,1.74537 h -3.08797 l -0.13426,1.61112 2.95371,0.93981 -0.26852,0.80556 -5.37038,1.34259 -1.47685,2.68519 h -2.41667 l -3.35648,8.05556 -4.02778,1.47685 -2.68519,1.20834 c 0,0 2.95371,0.53703 4.02778,0.53703 1.07408,0 3.89352,0 3.89352,0 l 0.80556,0.6713 h 2.28241 l 1.47685,1.87963 -3.08796,2.55093 h 5.50463 l 1.07407,-1.34259 0.93982,1.61111 7.78704,0.13426 h 5.77315 l 508.05718,0.26104 -15.5694,-12.72139 -2.6582,-12.15177 0.3797,-0.75948 h 1.519 l -1.519,-2.08859 -11.5821,-1.04429 -7.5949,0.18987 -8.6391,-0.56961 -2.3734,1.70884 -1.2342,1.70884 -1.7088,-0.2848 -1.2342,-1.89872 -10.1581,-0.56961 -7.7847,-0.37975 -2.9431,0.66455 -4.2721,2.56327 -1.9936,-1.3291 -1.3291,0.56961 -0.7595,-0.85442 h -3.4177 l -0.5696,-0.56961 h -9.0189 l -10.5379,-0.94936 -6.4556,2.18352 -2.1835,1.51897 -1.519,-1.89871 -2.0411,-0.0949 -0.8544,-0.85442 -10.4429,-0.52214 -3.7025,-0.56962 -5.6487,0.0949 -0.4272,0.52214 -4.462,-3.51262 -11.2973,-3.08541 -8.9715,3.93983 -2.1835,1.09176 -2.2784,2.84808 -0.7121,1.18669 -0.4272,-2.84807 -5.4113,-3.37022 -4.2246,-1.75631 -1.8513,-0.99682 -4.367,2.46833 -3.2753,2.84807 c 0,0 -0.9968,2.18352 -1.2342,2.84807 -0.2373,0.66455 -0.7595,3.46515 -0.7595,3.46515 l 2.9905,2.84807 -3.3227,1.37657 -3.3703,1.09176 -1.1392,-2.61073 0.095,-1.3291 -6.7405,-6.02842 -4.8417,-1.80378 -11.8195,-0.56961 -7.6898,0.23734 -4.9841,0.37974 -0.712,0.75949 h -1.4715 l -0.4272,-0.94936 -14.3828,-0.1424 -1.3291,0.94935 -1.1392,0.37975 -0.095,0.56961 -0.8069,-0.75948 -1.6614,-0.99683 -4.7468,-0.28481 -3.8923,-0.47468 -3.4177,0.66455 -4.41454,0.42722 -13.24353,-0.28481 -1.94618,0.52214 -6.12335,-1.4715 -4.79425,0.28481 -2.80061,0.75948 -13.81314,-0.1424 -2.42086,0.80695 -4.69932,-1.13922 -6.88284,0.0475 -4.46198,0.85442 -4.36704,1.99365 -5.07906,4.31958 -0.75948,1.80378 -2.75314,0.71201 -2.61073,1.1867 -1.94618,-1.70884 -6.3794,-2.77564 h -11.34491 l -5.16899,0.16783 -3.08796,-3.02084 -10.06945,0.90625 -38.19679,-1.00694 -1.8125,1.40972 -3.1551,-0.87269 -12.48612,0.46991 -4.83333,0.33565 -5.84028,-1.61111 -0.53704,1.94676 0.93981,0.87268 -3.22222,0.73843 -6.17593,-0.40278 -5.23612,-0.80555 0.93982,-1.61112 -6.24306,0.46991 -14.90279,0.13426 -1.00694,-0.80556 -1.87963,0.0671 -23.294,-0.20139 -2.28241,-0.87268 -0.73843,1.54398 v 0.33565 l -1.67824,0.33565 z"/>
                    <path class="stallButton" id="clickFreezer" d="m 679.92947,510.56419 2.08859,-0.0949 1.99365,0.66455 h 3.60755 l 0.28481,-0.85442 4.17717,-0.56962 1.70884,0.66455 2.46833,-0.66455 0.75949,-0.66455 h 3.32275 l 0.75948,-0.94935 2.46833,0.0949 2.08859,1.0443 3.22781,0.2848 2.18352,0.66455 h 3.13288 l 2.75313,0.94936 2.94301,-0.85442 2.37339,-0.47468 1.80378,-0.85442 1.61391,0.47468 2.84807,0.66455 4.46198,0.47468 1.6139,0.37974 h 2.46833 l 1.51897,-0.75949 2.46833,-0.47468 1.89872,0.28481 1.99365,-0.0949 1.13922,0.56961 -0.18987,52.49944 -10.25305,0.0949 -18.6074,34.93633 0.28481,112.68868 -37.59454,-0.37974 z"/>
                    <path class="stallButton" id="clickWhoWeAre" d="m 775.2135,408.28269 124.72694,0.6713 -0.13426,86.59728 -125.26398,-0.26852 z"/>
                    <path class="stallButton" id="clickMan" d="m 968.00993,431.97947 -4.63195,0.4699 -5.10185,2.08102 -3.35649,3.42362 -1.61111,3.22222 -0.46991,2.81945 -1.00694,5.77315 -0.46991,3.15509 0.20139,1.40973 0.53704,3.35648 -0.20139,3.69213 1.20833,4.83334 4.2963,10.33797 -0.80555,3.1551 -1.07408,0.87268 -4.49769,4.09491 -21.28011,3.55787 -10.33797,22.75696 -15.905,9.54134 -2.37339,1.51898 -1.13923,1.70884 0.18987,1.13923 0.94936,0.85442 -1.70884,0.37974 -1.3291,0.18987 -0.75949,1.70884 0.75949,0.75949 1.80378,1.51897 13.00619,4.27211 2.37339,1.04429 -0.18987,5.50627 -1.51897,1.89871 0.0949,1.3291 6.45563,11.6771 16.89855,-4.17718 1.3291,0.18988 -0.75948,11.10747 h 60.85378 l -0.47468,-11.20241 h 2.18357 l 15.2846,4.46198 6.9303,-13.00619 -0.4746,-0.28481 0.2848,-1.99365 -0.5696,-2.18352 8.6391,-2.18352 7.9746,3.41768 6.7404,3.22782 7.5,4.55691 0.3797,-2.75313 3.2278,-4.93666 1.0443,-3.79743 1.3291,-6.26575 0.5696,-8.73409 -0.8544,-4.46198 -0.5696,-1.51897 -5.0316,-0.0949 -8.5442,1.99365 -9.5885,3.60755 -14.5252,-4.93665 2.8481,-1.42404 -7.0253,-5.41133 -0.5696,-1.3291 -9.1138,-19.17701 -11.94382,-1.56892 -9.02894,-2.28241 -1.14121,-1.37616 -3.45717,-3.35648 -0.90626,-0.30208 -0.87268,-1.20834 -0.0336,-1.51042 1.54399,-5.16898 1.64467,-5.13542 1.47686,-3.08797 0.80555,-3.02083 -0.0671,-2.34954 1.00695,-7.31714 -0.87269,-5.63889 -1.34259,-4.2963 -2.28241,-4.49769 -5.16899,-3.02083 z"/>
                </svg>
                
                <svg id="fishZoomSvg" viewBox="0 0 1920 1080" width="1920px" height="1080px" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                    <path class="fishButton" id="squid" d="m 453.41289,596.57592 233.54182,2.27846 -36.83505,143.92252 H 403.28684 z"/>
                    <path class="fishButton" id="wholeFish" d="m 700.83381,588.59299 1037.01919,2.14815 73.5201,151.27627 -1138.46888,0.75949 z"/>
                    <path class="fishButton" id="prawn" d="m 502.66701,501.0559 354.44469,1.07407 -3.22223,29.00002 v 35.44447 l -387.741,-2.68519 z"/>
                    <path class="fishButton" id="steak" d="m 882.88949,494.07441 455.94471,0.53704 27.926,66.0556 -497.83368,3.75926 z"/>
                    <path class="fishButton" id="fillet" d="m 1346.6213,497.83367 227.4353,0.26852 38.3982,60.41671 -237.3705,1.34259 z"/>
                
                    <text class="fishText" id="squidText" xml:space="preserve" style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:35px;font-family:Arial;-inkscape-font-specification:'Arial Bold';fill:#1a1a1a" x="478.99716" y="680.97559">
                        <tspan sodipodi:role="line" id="tspan6" x="478.99716" y="680.97559">Squid</tspan>
                    </text>
                    <text class="fishText" id="wholeFishText" xml:space="preserve" style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:35px;font-family:Arial;-inkscape-font-specification:'Arial Bold';fill:#1a1a1a" x="1099.8525" y="683.11163">
                        <tspan sodipodi:role="line" id="tspan7" x="1099.8525" y="683.11163">Whole Fish</tspan>
                    </text>
                    <text class="fishText" id="prawnText" xml:space="preserve" style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:35px;font-family:Arial;-inkscape-font-specification:'Arial Bold';fill:#1a1a1a" x="586.44482" y="547.77814">
                        <tspan sodipodi:role="line" id="tspan8" x="586.44482" y="547.77814">Prawn</tspan>
                    </text>
                    <text class="fishText" id="steakText" xml:space="preserve" style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:35px;font-family:Arial;-inkscape-font-specification:'Arial Bold';fill:#1a1a1a" x="1052.5933" y="545.63">
                        <tspan sodipodi:role="line" id="tspan9" x="1052.5933" y="545.63">Steak</tspan>
                    </text>
                    <text class="fishText" id="filletText" xml:space="preserve" style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:35px;font-family:Arial;-inkscape-font-specification:'Arial Bold';fill:#1a1a1a" x="1419.9269" y="545.63">
                        <tspan id="tspan10" x="1419.9269" y="545.63" sodipodi:role="line">Fillet</tspan>
                    </text>
                </svg>
            </div>

            <div class="background">
                <video src="/wp-content/uploads/2024/01/room2Stall.mov" preload="auto"></video>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"
            integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"
            integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js"
            integrity="sha512-judXDFLnOTJsUwd55lhbrX3uSoSQSOZR6vNrsll+4ViUFv+XOIr/xaIK96soMj6s5jVszd7I97a0H+WhgFwTEg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.js"
            integrity="sha512-mq6TSOBEH8eoYFBvyDQOQf63xgTeAk7ps+MHGLWZ6Byz0BqQzrP+3GIgYL+KvLaWgpL8XgDVbIRYQeLa3Vqu6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script type="module" src="/wp-content/themes/homepage-theme/main.js"></script>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
