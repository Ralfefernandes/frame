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
            <form action="{{ route('dashboard.update', $client->id) }}) }}" method="POST" enctype="multipart/form-data">
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
            <table class="table table-secondary table-hover">
                <thead class="">
                <tr>
                    {{--   include the for  --}}
                    @include('dashboard.components.formattribute')
                </tr>
                </thead>
                <tbody>
                <tr class=" col">
                    <form action="{{ route('dashboard.update', ['client' => $client->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td class="row-cols-md-7">
                            <div class="form-group">
                                <label for="staticEmail" class=" col-lg-12-form-label ">
                                    <input type="text"  name="name" value="{{ $client->name }}"  class="form-control border border-warning">
                                </label>
                            </div>
                        </td>
                        <td class="row-cols-md-7">
                            <div class="form-group">
                                <label for="primary_color" class="col-md-10">
                                    <input type="color" id="primary_color" name="primary_color" value="{{ $client->primary_color }}" class="form-control">
                                </label>
                            </div>
                        </td>
                        <td class="row-cols-md-7">
                            <div class="form-group">
                                <label for="second_color" class="col-md-10">
                                    <input type="color" id="second_color" name="second_color" value="{{ $client->second_color }}" class="form-control">
                                </label>
                            </div>
                        </td>
                        @foreach($client->getAttributes() as $fieldName => $fieldValue)
                            @if ($fieldName !== 'id' && !in_array($fieldName, ['created_at', 'updated_at', 'name', 'primary_color','url', 'second_color']))
                                <td class="row-cols-md-7">
                                    @if ($fieldName === 'logo')
                                        <img src="{{ asset($fieldValue) }}" alt="Logo" class="logo-image" style="width: {{ $width }}px; height: {{ $height }}px;">
                                        <input type="file" name="{{ $fieldName }}" accept="image/*" class="form-control-file">
                                    @elseif ($fieldName === 'collect_email' || $fieldName === 'consent_for_questions')
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $fieldName }}" id="{{ $fieldName }}_yes_{{ $client->id }}" value="1" {{ $fieldValue ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $fieldName }}_yes_{{ $client->id }}">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="{{ $fieldName }}" id="{{ $fieldName }}_no_{{ $client->id }}" value="0" {{ !$fieldValue ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $fieldName }}_no_{{ $client->id }}">
                                                No
                                            </label>
                                        </div>
                                    @else
                                        <label>
                                            <input type="text" name="{{ $fieldName }}" value="{{ $fieldValue }}" class="col-md-12 form-control border border-info">
                                        </label>
                                    @endif
                                </td>
                            @endif
                        @endforeach


                        <td>
                            <div class="button-list">
                                <button type="submit" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i> Update</button>
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

@include('dashboard.frame.show', ['id' => $client->id])

{{-- End frames--}}

@include('dashboard.components.footer')
