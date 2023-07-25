<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        let order = Array.from(document.querySelectorAll('#sortable tr')).map(row => row.id.replace('frames_', ''));

        console.log("Initial order:", order); // Log initial order

        new Sortable(document.getElementById('sortable'), {
            animation: 150,
            onUpdate: function () {
                saveOrder();
            }
        });

        function saveOrder() {
            order = Array.from(document.querySelectorAll('#sortable tr')).map(row => row.id.replace('frames_', ''));

            console.log("New order:", order); // Log new order
        }

        document.getElementById('save-order-btn').addEventListener('click', function (event) {
            event.preventDefault();

            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            let formData = {
                order: order
            };

            console.log("Sending data:", JSON.stringify(formData));

            fetch('/frames/save-sorter', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify(formData),
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
                    alert(data.message); // Show success message
                })
                .catch(function (error) {
                    console.log('There has been a problem with your fetch operation: ' + error.message);
                    alert('An error occurred while saving sort order.'); // Show error message
                });
        });
    });
</script>
