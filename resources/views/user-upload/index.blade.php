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
                        @php
                            // Set the selected_frame_id session variable
                        session(['selected_frame_id' => $frame->id]);
                        @endphp
                    @endforeach
                </div>
            </div>
            <!-- Outslide Splide Track-->
            <div class="cover-button-bottom cover-button-bottom d-flex justify-content-center">
                <form name="photo_url"  value="{{ old('photo_url') }}" id="uploadForm" enctype="multipart/form-data" action="{{ route('upload-photo') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Input field for the photo -->
                    <label for="photoInput" class="btn btn-m rounded-l shadow-xl btn-full bg-fade-green-light font-900 text button-m scale-box">Choose Photo</label>
                    <input type="file" name="photo" accept="image/*" id="photoInput" style="display: none;">
                </form>
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

@include('user-upload.scripts.script')


</body>

{{--<script src="assets/userframes/_service-worker.js"> </script>--}}





