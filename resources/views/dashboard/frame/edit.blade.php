@include('dashboard.components.header')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Edit Frame</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Back End</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Frame</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <form action="{{ route('frames.update', $frame->id) }}" method="POST" enctype="multipart/form-data">
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
                    @foreach($filteredColumns as $columnName)
                        <th>{{ $columnName }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form id="frame-form" action="{{ route('frames.update',  $frame->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @foreach($frame->getAttributes() as $fieldName => $fieldValue)

                            @if ($fieldName === 'photo_url')
                                <td>
                                    <label for="frame-input">
                                        <img class="border border-warning text-black-50" src="{{ asset($fieldValue) }}" alt="Frame Image" width="100px" height="100px" id="frame-image">
                                    </label>
                                    <input type="file" name="{{ $fieldName }}"  class="form-control" id="frame-input" style="display: none;">

                                </td>
                            @elseif (!in_array($fieldName, ['id', 'created_at', 'updated_at', 'sort', 'edit', 'client_id', 'margin_bottom', 'margin_left', 'margin_right', 'margin_top']))
                                <td>

                                    <input type="text" name="{{ $fieldName }}" value="{{ $fieldValue }}" class="form-control border border-warning col-8 p-3 mb-2 bg-light text-dark" >
                                </td>
                            @endif
                        @endforeach
                        <td>
                            <div class="button-list">
                                <button type="submit" class="btn btn-success-rgba" id="update-frame-btn">Update</button>
                            </div>
                        </td>
                    </form>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#frame-image').click(function() {
            $('#frame-input').click();
        });

        $('#frame-form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response
                    // You can update any necessary elements on the page
                    console.log('Image updated successfully!');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log('Error updating image: ' + error);
                }
            });
        });
    });
</script>
