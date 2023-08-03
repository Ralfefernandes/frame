
@extends('layouts.app')


@section('content')

        @include('dashboard.components.userapp.head')

        @if(session('view') ===  'user-upload.update')
            @include('user-upload.update')

        @else
            <!-- Start Contentbar -->
    <div class="contentbar">

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-7 col-xl-8">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Image Cropping</h5>
                    </div>
                    <div class="card-body">
                        @php
                            // Retrieve the selected_frame_id from the session
                            $selectedFrameId = session('selected_frame_id');
                        @endphp

                        <form id="croppedImageForm" action="{{ route('save.cropped.image', $selectedFrameId) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <input type="hidden" name="frame_id" value="{{ session('selected_frame_id') }}">
                            <div class="img-container">
                                <img src="{{ asset('frames/photos/' . $photoFileName) }}" id="image" class="cropper-hidden" alt="Picture" data-type="image/jpeg">
                            </div>
                            <!-- Input field for the title caption -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                            </div>

                            <!-- Input field for the filename caption -->
                            <div class="mb-3">
                                <label for="filename" class="form-label">Filename</label>
                                <input type="text" class="form-control" id="filename" name="filename" value="{{ old('filename') }}" placeholder="Enter filename">
                            </div>
                            <!-- Hidden input fields to store the cropped image data -->
                            <input type="hidden" id="dataX" name="dataX" value="">
                            <input type="hidden" id="dataY" name="dataY" value="">
                            <input type="hidden" id="dataHeight" name="dataHeight" value="">
                            <input type="hidden" id="dataWidth" name="dataWidth" value="">
                            <!-- Hidden input fields to store the margin details -->
                            <input type="hidden" name="marginTop" id="marginTop">
                            <input type="hidden" name="marginBottom" id="marginBottom">
                            <input type="hidden" name="marginLeft" id="marginLeft">
                            <input type="hidden" name="marginRight" id="marginRight">

                            <!-- Hidden input field to store the cropped image data -->
                            <input type="hidden" name="croppedImageData" id="croppedImageData">

                            <!-- Add the button for saving the cropped image and details -->
                            <button type="submit" id="saveCroppedImageBtn" class="btn btn-primary">Save Cropped Image</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- End col -->
            <!-- Start col -->
        </div>
        <!-- End row -->

    </div>
    <!-- End Contentbar -->


    @include('dashboard.components.userapp.footer')
        @endif

<script>

</script>
@endsection

