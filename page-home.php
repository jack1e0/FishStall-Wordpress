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

        .homepage {
            object-fit: cover;
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

    </style>

    <div id="primary" <?php astra_primary_class(); ?>>
        <div class="homepage">
            <button id="backButton" class="backButton">Back</button>
            <div id="stall" class="stall">
                <img src="/wp-content/uploads/2024/01/room.png" alt="stall">

                <svg viewBox="0 0 1920 1080" width="1920px" height="1080px" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" id="stallSvg">
                    <path class="stallButton" id="clickFish" d="m 678,600.5 10,-12 9,-4 5,-5.5 64.5,1.5 12.5,2.5 4.5,-5.5 99,2.5 23,7.5 8.5,-4 16,-9.5 151,-0.5 16.5,9 8.5,4 -3,-8.5 10,-9 14,5.5 22,-5.5 20.5,6.5 29.5,3.5 14,-3 30.5,3.5 11.5,-4 26,3 18.5,-2.5 21.5,2.5 2.5,13 7.5,10.5 11.5,7.5 -177.5,-2 -14,5 -33.5,-2.5 -62.5,-0.5 -162.5,1.5 -79.5,1 -128.5,-2 z"/>
                    <path class="stallButton" id="clickFreezer" d="m 569.5,499.5 127,0.5 0.5,66.5 -14,-1 -29.5,48 0.5,132 h -84.5 z"/>
                    <path class="stallButton" id="clickWhoWeAre" d="m 710,337.5 v 24 l 26,0.5 0.5,124.5 153,1.5 -2,-108.5 H 866 l -0.5,-45 z"/>
                    <path class="stallButton" id="clickReceipt" d="m 968.02918,330.92597 0.70711,74.95332 19.79899,2.82843 5.65685,19.09188 -2.12132,16.26346 -8.48528,17.67767 9.89949,10.6066 25.45588,6.36396 7.071,19.09188 28.2843,19.79899 28.2843,-8.48528 2.1213,7.77818 229.8097,0.7071 -2.1213,-40.30508 -17.6777,0.7071 v -88.38835 l 18.3848,-8.48528 -0.7071,-52.3259 z"/>
                    <path class="stallButton" id="clickMan" d="M 951.5,421.5 962,409 l 13,-1.5 14.5,7 4.5,20 -5.5,16 -6.5,11.5 10,9 16.5,4 9.5,3 7.5,19 28,22 28,-9 -8,38.5 -29,-13.5 -10,2.5 -4.5,22 c 0,0 -19.5,-7.5 -19.5,-4.5 0,3 -4,13.5 -4,13.5 l -74,-0.5 2,-14 H 929 l -17.5,5.5 -10,-16.5 3.5,-10.5 -20,-8 27.5,-22.5 9.5,-25.5 26,-3.5 8,-10 -8,-17 z"/>
                </svg>
            </div>

            <div class="background">
                <video src="/wp-content/uploads/2024/01/roomToStall50fps.mov" preload="auto"></video>
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
