@extends('layouts.user-upload') <!-- Replace 'layouts.app' with your desired layout -->

@extends('layouts.app') <!-- Assuming you have a layout file called 'app.blade.php' -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload Photo') }}</div>

                    <div class="card-body">
                        <form id="uploadForm" enctype="multipart/form-data" action="{{ route('uploadPhoto') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="photoInput">{{ __('Choose Photo') }}</label>
                                <input type="file" name="photo" accept="image/*" id="photoInput" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}">
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="titleInput">{{ __('Title') }}</label>
                                <input type="text" name="title" placeholder="Enter title" id="titleInput" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button id="previewButton" class="btn btn-primary" style="display: none;">{{ __('Preview Photo') }}</button>
                            <button id="uploadButton" class="btn btn-primary" style="display: none;">{{ __('Upload Photo') }}</button>

                            <div>
                                @if(isset($photoUrl))
                                    <img src="{{ asset($photoUrl) }}" alt="Uploaded Photo" style="max-width: 100%;">
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="chooseFileButton" class="btn btn-primary">{{ __('Choose Photo') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('chooseFileButton').addEventListener('click', function () {
            document.getElementById('photoInput').click();
        });

        document.getElementById('photoInput').addEventListener('change', function () {
            const fileInput = document.getElementById('photoInput');
            const file = fileInput.files[0];

            if (file) {
                document.getElementById('titleInput').style.display = 'block';
                document.getElementById('previewButton').style.display = 'block';
            } else {
                document.getElementById('titleInput').style.display = 'none';
                document.getElementById('previewButton').style.display = 'none';
                document.getElementById('uploadButton').style.display = 'none';
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
@endsection
