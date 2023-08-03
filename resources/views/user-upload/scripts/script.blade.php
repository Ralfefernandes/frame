
<script>
    document.getElementById('photoInput').addEventListener('change', function() {
        // Automatically submit the form when a file is selected
        document.getElementById('uploadForm').submit();
    });
</script>

// cropper

<!-- JavaScript code for Cropper.js -->
@isset($photoFileName)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const image = document.getElementById('image');
            const cropper = new Cropper(image, {
                aspectRatio: 16 / 9, // Adjust the aspect ratio as needed
                viewMode: 1,
                dragMode: 'move',
                responsive: true,
                cropBoxResizable: true,
                crop(event) {
                    // Update hidden input fields with the cropping data
                    document.getElementById('crop_x').value = event.detail.x;
                    document.getElementById('crop_y').value = event.detail.y;
                    document.getElementById('crop_width').value = event.detail.width;
                    document.getElementById('crop_height').value = event.detail.height;
                },
            });

            // Handle form submission
            const form = document.getElementById('cropForm');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                // Submit the form via Ajax or perform other actions
                // You can use FormData to send the cropping data and the original image file to the server
                const formData = new FormData(form);
                // Add any other form data if needed
                // formData.append('other_field', 'other_value');
                // Perform Ajax request or other actions here
            });
        });
    </script>
@endisset
