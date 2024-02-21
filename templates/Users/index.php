<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Connexion> $connexions
 */
?>


<main class="main" id="top">
    <div class="preloader" id="preloader">
        <div class="loader-box">
            <div class="loader"></div>
        </div>
    </div>
    <section class="py-0">
        <div class="swiper theme-slider min-vh-100" data-swiper='{"loop":true,"allowTouchMove":false,"autoplay":{"delay":5000},"effect":"fade","speed":800}'>
            <div class="swiper-slide" data-zanim-timeline="{}">
                <div class="bg-holder overlay overlay-freya"> <img class="img-fluid" src="<?= $this->Path->getTemplatePath() ?>assets/img/header_2.jpg" alt="Residential" /> <data-parallax="data-parallax" data-rellax-speed="-3"></div>
                <!--/.bg-holder-->
                <div class="container">
                    <div class="row min-vh-100 justify-content-start align-items-end pt-11 pb-6 text-white" data-zanim-timeline="{}">
                        <div class="col">
                            <div class="row align-items-end">
                                <div class="col-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
                <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
            </div>
    </section>

    <section>
    </section>

    <section class="py-10 overflow-hidden text-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
        <div class="bg-holder overlay overlay-1"> <img class="img-fluid" src="<?= $this->Path->getTemplatePath() ?>assets/img/header_3.jpg" alt="Residential" /> <data-parallax="data-parallax" data-rellax-speed="0,5"></div>
        <!--/.bg-holder-->
        <div class="container">
            <div class="overflow-hidden">
                <h1 class="fs-5 fs-sm-6 text-white mb-3" data-zanim-xs='{"delay":0}'>LA RECHERCHE</ h1>
            </div>
            <div class="overflow-hidden">
                <h4 class="ls fw-light text-uppercase text-300 mb-0" data-zanim-xs='{"delay":0.1}'>Manitoba</h4>
            </div>
        </div><!-- end of .container-->
    </section><!-- <section> close ============================-->

    <section class=" text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h3 class="mb-4">A Brooklyn space becomes greener than ever.</h3>
                    <p class="mb-7">With Freya's magical touch, a office space at Brooklyn becomes
                        greener than ever. Cras matti consectetur purus st amet fermentum. Donec id elit
                        non mi porta gravida at eget metus. Morbi leo risus, consectetur ac, vestibulum at
                        eros. Aenean eu leo quam. Pellentesque ornare sem lacinia qua venenatis
                        vestibulum. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget
                        risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi
                        erat porttitor ligula neget.</p>
                </div>
            </div>
            <div class="row">
                <div class=" col-12 mb-4"><img class="w-100" src="<?= $this->Path->getTemplatePath() ?>assets/img/img_7.jpg" alt="galleryimage"></div>
                <div class=" col-lg-6 mb-4"><img class="w-100" src="<?= $this->Path->getTemplatePath() ?>assets/img/img_8.jpg" alt="gallery image"></div>
                <div class=" col-lg-6 mb-4"><img class="w-100" src="<?= $this->Path->getTemplatePath() ?>assets/img/img_9.jpg" alt="gallery image"></div>
            </div>
        </div><!-- end of .container-->
    </section><!-- <section> close ============================-->

    <!-- Testimonial Start -->

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="section-title bg-white text-center text-primary px-3">Temoignage</h6>
                    <h1 class="mb-5">Nos Utilisateur Disent!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative">
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="<?= $this->Path->getTemplatePath() ?>assets/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Client Name</h5>
                        <p>Profession</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit
                                diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="<?= $this->Path->getTemplatePath() ?>assets/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Client Name</h5>
                        <p>Profession</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit
                                diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="<?= $this->Path->getTemplatePath() ?>assets/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Client Name</h5>
                        <p>Profession</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit
                                diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="border rounded-circle p-2 mx-auto mb-3" src="<?= $this->Path->getTemplatePath() ?>assets/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                        <h5 class="mb-0">Client Name</h5>
                        <p>Profession</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit
                                diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


</main>
