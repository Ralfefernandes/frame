@include('dashboard.components.header')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Product List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Back End</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <form action="{{ route('dashboard.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="widgetbar">
                    <button class="btn btn-primary-rgba" type="submit"><i class="feather icon-plus mr-2"></i>Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                <tr>
                    {{--   include the for  --}}
                    @include('dashboard.components.formattribute')
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form action="{{ route('dashboard.update', $client->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @foreach($client->getAttributes() as $fieldName => $fieldValue)

                            @if (!in_array($fieldName, ['created_at', 'updated_at']))
                                <td class="row-cols-md-7">
                                    @if ($fieldName === 'logo')
                                        <img src="{{ asset($fieldValue) }}" alt="Logo" class="logo-image"
                                             style="width: {{ $width }}px; height: {{ $height }}px;">
                                        <input type="file" name="{{ $fieldName }}" accept="image/*">
                                    @else
                                        <input type="text" name="{{ $fieldName }}" value="{{ $fieldValue }}"
                                               class="col-md-12 form-control">
                                    @endif
                                </td>
                            @endif
                        @endforeach

                        <td>
                            <div class="button-list">
                                <button type="submit" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i>
                                    Update
                                </button>
                            </div>
                        </td>
                    </form>


                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Starts the frames --}}
@foreach ($frames as $frame)

    @include('dashboard.components.frame', ['id' => $frame->id])
@endforeach

{{-- End frames--}}

{{--
@include('dashboard.carousel.carousel')->with('carouselData', $carouselData)
--}}


@include('dashboard.components.footer')
