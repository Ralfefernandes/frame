@include('layouts.user-upload')

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="page-content pb-0">

        <a href="#" data-toggle-theme class="show-on-theme-light cover-button-top btn btn-xs rounded-xl shadow-huge btn-center-s font-900 bg-green-dark "><i class="fa fa-moon me-3"></i>DARK MODE</a>
        <a href="#" data-toggle-theme class="show-on-theme-dark cover-button-top btn btn-xs rounded-xl shadow-huge btn-center-s font-900 bg-green-dark "><i class="fa fa-sun me-3"></i>LIGHT MODE</a>

        <div class="splide single-slider slider-no-arrows" id="walkthrough-slider">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach ($frames as $frame)
                        <div class="splide__slide">
                            <div data-card-height="cover" class="card text-center pb-5">
                                <div class="card-bottom">
                                    <h1 class="font-700 font-32 mb-0">{{ $frame->title }}</h1>
                                    <h6 class="font-400 font-15 mb-3 pb-1 color-highlight">{{ $frame->filename }}</h6>
                                    <p class="color-theme boxed-text-xl opacity-80 pb-5 mb-5">
                                    </p>
                                    <p class="pb-4"></p>
                                </div>
                                <div class="card-overlay" style="height:70vh; background-image: url('{{ $frame->photo_url }}')"></div>
                                <!-- setting height to 70% to make text more easy to read -->
                                <div class="card-overlay bg-gradient-fade"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Outslide Splide Track-->
            <div class="cover-button-bottom cover-button-bottom d-flex justify-content-center">
                <form id="uploadForm" enctype="multipart/form-data" action="{{ route('uploadPhoto') }}" method="POST">
                    @csrf
                    <input type="file" name="photo" accept="image/*" id="photoInput" style="display: none;">
                    <button id="chooseFileButton" class="btn btn-m rounded-l shadow-xl btn-full bg-green-dark font-900 text button-m scale-box">Choose Photo</button>

                    <!-- Container for other input fields -->
                    <div id="inputFieldsContainer" style="display: none;">
                        <input type="text" name="title" placeholder="Enter title">
                        <input type="email" name="collect_email" placeholder="Enter email">
                        <label for="consentInput">Consent for Questions:</label>
                        <input type="checkbox" name="consent_for_questions" id="consentInput">
                        <button id="previewButton" class="btn btn-m rounded-l shadow-xl btn-full bg-green-dark font-900 text button-m scale-box">Preview Photo</button>
                        <button id="uploadButton" class="btn btn-m rounded-l shadow-xl btn-full bg-green-dark font-900 text button-m scale-box" style="display: none;">Upload Photo</button>
                    </div>
                </form>
            </div>

            <div>
                <img id="photoPreview" src="" alt="Photo Preview" style="max-width: 100%; display: none;">
            </div>


            <div>
                <img id="photoPreview" src="" alt="Photo Preview" style="max-width: 100%; display: none;">
            </div>
            <a href="#" class="cover-next slider-next color-gray-dark">Next<i class="fa fa-angle-right me-3 ms-2"></i></a>
            <a href="#" class="cover-prev slider-prev color-gray-dark"><i class="fa fa-angle-left me-2 ms-3"></i>Previous</a>
        </div>
    </div>



    <!-- End of Page Content-->
    <!-- All Menus, Action Sheets, Modals, Notifications, Toasts get Placed outside the <div class="page-content"> -->
    <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title mt-0 pt-0"><h1>Settings</h1><p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="divider divider-margins mb-n2"></div>
        <div class="content">
            <div class="list-group list-custom-small">
                <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                    <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                    <span>Dark Mode</span>
                    <div class="custom-control scale-switch ios-switch">
                        <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode">
                        <label class="custom-control-label" for="switch-dark-mode"></label>
                    </div>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <div class="list-group list-custom-large">
                <a data-menu="menu-highlights" href="#">
                    <i class="fa font-14 fa-tint bg-green-dark rounded-s"></i>
                    <span>Page Highlight</span>
                    <strong>16 Colors Highlights Included</strong>
                    <span class="badge bg-highlight color-white">HOT</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a data-menu="menu-backgrounds" href="#" class="border-0">
                    <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                    <span>Background Color</span>
                    <strong>10 Page Gradients Included</strong>
                    <span class="badge bg-highlight color-white">NEW</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Menu Settings Highlights-->
    <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title"><h1>Highlights</h1><p class="color-highlight">Any Element can have a Highlight Color</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="divider divider-margins mb-n2"></div>
        <div class="content">
            <div class="highlight-changer">
                <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span class="color-blue-light">Default</span></a>
                <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span class="color-red-light">Red</span></a>
                <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span class="color-orange-light">Orange</span></a>
                <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span class="color-pink-dark">Pink</span></a>
                <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span class="color-magenta-light">Purple</span></a>
                <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span class="color-aqua-light">Aqua</span></a>
                <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span class="color-teal-light">Teal</span></a>
                <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span class="color-mint-light">Mint</span></a>
                <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span class="color-green-light">Green</span></a>
                <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span class="color-green-dark">Grass</span></a>
                <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span class="color-yellow-light">Sunny</span></a>
                <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span class="color-yellow-light">Goldish</span></a>
                <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span class="color-brown-light">Wood</span></a>
                <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span class="color-dark-light">Night</span></a>
                <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span class="color-dark-light">Dark</span></a>
                <div class="clearfix"></div>
            </div>
            <a href="#" data-menu="menu-settings" class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to Settings</a>
        </div>
    </div>
    <!-- Menu Settings Backgrounds-->
    <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title"><h1>Backgrounds</h1><p class="color-highlight">Change Page Color Behind Content Boxes</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="divider divider-margins mb-n2"></div>
        <div class="content">
            <div class="background-changer">
                <a href="#" data-change-background="default"><i class="bg-theme"></i><span class="color-dark-dark">Default</span></a>
                <a href="#" data-change-background="plum"><i class="body-plum"></i><span class="color-plum-dark">Plum</span></a>
                <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span class="color-dark-dark">Magenta</span></a>
                <a href="#" data-change-background="dark"><i class="body-dark"></i><span class="color-dark-dark">Dark</span></a>
                <a href="#" data-change-background="violet"><i class="body-violet"></i><span class="color-violet-dark">Violet</span></a>
                <a href="#" data-change-background="red"><i class="body-red"></i><span class="color-red-dark">Red</span></a>
                <a href="#" data-change-background="green"><i class="body-green"></i><span class="color-green-dark">Green</span></a>
                <a href="#" data-change-background="sky"><i class="body-sky"></i><span class="color-sky-dark">Sky</span></a>
                <a href="#" data-change-background="orange"><i class="body-orange"></i><span class="color-orange-dark">Orange</span></a>
                <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span class="color-yellow-dark">Yellow</span></a>
                <div class="clearfix"></div>
            </div>
            <a href="#" data-menu="menu-settings" class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to Settings</a>
        </div>
    </div>
    <!-- Menu Share -->
    <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title mt-n1"><h1>Share the Love</h1><p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="content mb-0">
            <div class="divider mb-0"></div>
            <div class="list-group list-custom-small list-icon-0">
                <a href="auto_generated" class="shareToFacebook external-link">
                    <i class="font-18 fab fa-facebook-square color-facebook"></i>
                    <span class="font-13">Facebook</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToTwitter external-link">
                    <i class="font-18 fab fa-twitter-square color-twitter"></i>
                    <span class="font-13">Twitter</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToLinkedIn external-link">
                    <i class="font-18 fab fa-linkedin color-linkedin"></i>
                    <span class="font-13">LinkedIn</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToWhatsApp external-link">
                    <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                    <span class="font-13">WhatsApp</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToMail external-link border-0">
                    <i class="font-18 fa fa-envelope-square color-mail"></i>
                    <span class="font-13">Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-l mt-4 pb-3">
            <img class="rounded-l mb-3" src="{{URL::asset('/assets/userframes/app/icons/icon-128x128.png')}}" alt="img" width="90">
            <h4 class="mt-3">Add Sticky on your Home Screen</h4>
            <p>
                Install Sticky on your home screen, and access it just like a regular app. It really is that simple!
            </p>
            <a href="#" class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Add to Home Screen</a><br>
            <a href="#" class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe later</a>
            <div class="clear"></div>
        </div>
    </div>

    <!-- Install instructions for iOS -->
    <div id="menu-install-pwa-ios"
        class="menu menu-box-bottom menu-box-detached rounded-l">
        <div class="boxed-text-xl mt-4 pb-3">
            <img class="rounded-l mb-3" src="{{URL::asset('/assets/userframes/app/icons/icon-128x128.png')}}" alt="img" width="90">
            <h4 class="mt-3">Add Sticky on your Home Screen</h4>
            <p class="mb-0 pb-0">
                Install Sticky, and access it like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <div class="clearfix pt-3"></div>
            <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
        </div>
    </div>

</div>
{{--<script src="assets/userframes/_service-worker.js"> </script>--}}
<script type="text/javascript" src="{{('assets/userframes/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{('assets/userframes/scripts/custom.js')}}"></script>


<!-- Add the Service Worker registration code -->

</body>

{{--<script src="assets/userframes/_service-worker.js"> </script>--}}

<script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
<script>
    document.getElementById('chooseFileButton').addEventListener('click', function () {
        document.getElementById('photoInput').click();
    });

    document.getElementById('photoInput').addEventListener('change', function () {
        const fileInput = document.getElementById('photoInput');
        const file = fileInput.files[0];

        if (file) {
            document.getElementById('inputFieldsContainer').style.display = 'block';
            document.getElementById('photoPreview').style.display = 'block';
            document.getElementById('previewButton').style.display = 'block';
            document.getElementById('chooseFileButton').style.display = 'none';
        } else {
            document.getElementById('inputFieldsContainer').style.display = 'none';
            document.getElementById('photoPreview').style.display = 'none';
            document.getElementById('previewButton').style.display = 'none';
            document.getElementById('uploadButton').style.display = 'none';
            document.getElementById('chooseFileButton').style.display = 'block';
        }
    });

    document.getElementById('previewButton').addEventListener('click', function () {
        const fileInput = document.getElementById('photoInput');
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('photoPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);

            document.getElementById('uploadButton').style.display = 'block';
        }
    });

</script>



