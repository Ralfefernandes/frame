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
                <form class="" id="frame-form" action="{{ route('frames.store', $client) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="frame-name">Frame naam</label>
                        <input type="text" class="form-control border border-warning" id="frame_name" name="frame_name" required>

                        @error('frame_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="frame-filename">Bestandsnaam</label>
                        <input type="text" class="form-control border border-warning rounded-bottom" id="frame_filename" name="frame_filename" required>
                    </div>
                    <div class="form-group">
                        <label for="frame-image">Frame afbeelding</label>
                        <input type="file" class="form-control border border-warning" id="frame-image" name="frame_image">
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
