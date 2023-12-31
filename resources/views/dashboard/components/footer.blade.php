<div class="footerbar">
    <footer class="footer">
        <p class="mb-0">© 2023 Fernando - All Rights Reserved.</p>
    </footer>
</div>
<!-- End Footerbar -->
</div>
<!-- End Rightbar -->
</div>
<!-- End Containerbar -->


<script>
    const form = document.getElementById('client-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform AJAX request to submit the form
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
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
                    window.location.href = "{{ route('dashboard.index') }}"; // Redirect to index page
                }, 2000); // Reset after 2 seconds (adjust the delay as needed)
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    });
</script>



// end sorteren js
<script src="{{('/assets/js/cdn.jsdelivr.net_npm_swiper@10_swiper-bundle.min.js')}}"></script>
<script src="{{'/assets/js/jquery.min.js'}}"></script>
<script src="{{'/assets/js/popper.min.js'}}"></script>
<script src="{{'/assets/js/bootstrap.min.js'}}"></script>
<script src="{{'/assets/js/modernizr.min.js'}}"></script>
<script src="{{'/assets/js/detect.js'}}"></script>
<script src="{{'/assets/js/jquery.slimscroll.js'}}"></script>
<script src="{{'/assets/js/vertical-menu.js'}}"></script>
<!-- Switchery js -->
<script src="{{'/assets/plugins/switchery/switchery.min.js'}}"></script>
<!-- Core js -->
<script src="{{'/assets/js/core.js'}}"></script>
<!-- End js -->
</body>
</html>
