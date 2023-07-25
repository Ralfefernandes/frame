<script>
    $(document).ready(function() {
    $('#createFrameModal').on('shown.bs.modal', function() {
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
                        window.location.href = "{{ route('dashboard.edit', $client->id) }}"; // Redirect to index page
                    }, 3000); // Reset after 3 seconds
                })
                .catch(error => {
                    console.error('An error occurred:', error);
                });
        });
    });
});
</script>
