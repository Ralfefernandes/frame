@include('dashboard.components.master');
<!-- Swiper -->
<section class="slider_container">
    <div class="container">
        <!-- Main Image -->
        <div class="main_image text-center">
            <img class="img-thumbnail img-fluid rounded mx-auto d-block" src="https://swiperjs.com/demos/images/nature-1.jpg" />
            <div class="caption frame-carousel bg-dark text-white text-center">Caption for the Main Image</div>
        </div>
        <!-- Swiper Gallery -->
        <div class="swiper card_slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-1.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-1.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-1.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-2.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-3.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-6.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-7.jpg" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_box">
                        <img class="img-thumbnail" src="https://swiperjs.com/demos/images/nature-7.jpg" />
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="text/javascript">
    // Initialize Swiper
    var gallerySwiper = new Swiper(".card_slider", {
        // Swiper configuration options
        slidesPerView: 4,
        spaceBetween: 40,
        loop: true,
        speeds: 3000,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    // Get the main image element
    const mainImage = document.querySelector(".main_image img");

    // Get all the gallery images
    const galleryImages = document.querySelectorAll(".swiper-wrapper .img_box img");

    // Add click event listeners to the gallery images
    galleryImages.forEach(function (image) {
        image.addEventListener("click", function () {
            // Update the source of the main image with the clicked image
            mainImage.src = image.src;
        });
        image.addEventListener("dblclick", function () {
            // Open a file dialog to select a new image
            const input = document.createElement("input");
            input.type = "file";
            input.accept = "image/*";
            input.addEventListener("change", function (event) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Update the source of the main image with the uploaded image
                    mainImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
            input.click();
        });
    });


</script>

