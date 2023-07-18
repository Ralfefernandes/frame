<div class="card mt-5">
    <div class="card-body">
        <!-- Frame creation button -->
        <button type="button" class="btn btn-primary-rgba float-right" data-toggle="modal" data-target="#createFrameModal">
            <i class="feather icon-plus mr-2"></i>Nieuwe Frame
        </button>

        <!-- Frame table -->
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>Frame naam</th>
                    <th>Bestandsnaam</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Frame01</td>
                    <td>Frame01.png</td>
                    <td>
                        <a href="#" class="btn btn-success-rgba">
                            Edit <i class="feather icon-edit-2"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Frame02</td>
                    <td>Frame02.png</td>
                    <td>
                        <a href="#" class="btn btn-success-rgba">
                            Edit <i class="feather icon-edit-2"></i>
                        </a>
                    </td>
                </tr>
                <!-- Add more rows here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Frame creation modal -->
<div class="modal fade" id="createFrameModal" tabindex="-1" role="dialog" aria-labelledby="createFrameModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFrameModalTitle">Create New Frame</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Frame creation form -->
                <form id="frame-form" action="{{ route('frames.store', $frame->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="frame-name">Frame naam</label>
                        <input type="text" class="form-control" id="frame-name" name="frame_name" required>
                    </div>
                    <div class="form-group">
                        <label for="frame-filename">Bestandsnaam</label>
                        <input type="text" class="form-control" id="frame-filename" name="frame_filename" required>
                    </div>
                    <div class="form-group">
                        <label for="frame-image">Frame afbeelding</label>
                        <input type="file" class="form-control" id="frame-image" name="frame_image" >
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <div id="success-message" style="display: none;"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript code for form submission -->
<script>
    const form = document.getElementById('frame-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Perform AJAX request to submit the form
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
            }
        })
            .then(response => response.json())
            .then(data => {
                // Display the success message in the form
                const successMessage = document.getElementById('success-message');
                successMessage.textContent = data.message;
                successMessage.style.display = 'block';

                // Reset the form after a delay
                setTimeout(() => {
                    form.reset();
                    successMessage.style.display = 'none';
                    window.location.href = "{{ route('dashboard.edit', ['id' => $frame->id]) }}"; // Redirect to index page
                }, 2000); // Reset after 2 seconds (adjust the delay as needed)
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    });
</script>
