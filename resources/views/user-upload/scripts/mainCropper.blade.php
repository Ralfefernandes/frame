<script>
    window.onload = function () {
        'use strict';

        var Cropper = window.Cropper;




        // Add the event listener for the button
        document.getElementById('saveCroppedImageBtn').addEventListener('click', function() {
            // Get the cropped image data and margin details from Cropper.js
            var croppedCanvas = cropper.getCroppedCanvas();
            var croppedImageData = croppedCanvas.toDataURL('image/jpeg');
            var marginTop = document.getElementById('dataY').value;
            var marginBottom = document.getElementById('dataHeight').value;
            var marginLeft = document.getElementById('dataX').value;
            var marginRight = document.getElementById('dataWidth').value;

            // Set the form values
            document.getElementById('croppedImageData').value = croppedImageData;
            document.getElementById('marginTop').value = marginTop;
            document.getElementById('marginBottom').value = marginBottom;
            document.getElementById('marginLeft').value = marginLeft;
            document.getElementById('marginRight').value = marginRight;

            // Submit the form
            document.getElementById('croppedImageForm').submit();
        });
    };
</script>
