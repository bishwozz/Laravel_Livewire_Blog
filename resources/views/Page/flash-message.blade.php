<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session()->has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session()->get('success') }}',
        timer: 5000, // Display duration in milliseconds (5 seconds in this example)
        toast: true,
        position: 'top-end',
        showConfirmButton: false
    });
</script>
@endif

@if(session()->has('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ session()->get('error') }}',
        timer: 5000, // Display duration in milliseconds (5 seconds in this example)
        toast: true,
        position: 'top-end',
        showConfirmButton: false
    });
</script>
@endif

@if(session()->has('message'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'warning!',
        text: '{{ session()->get('message') }}',
        timer: 5000, // Display duration in milliseconds (5 seconds in this example)
        toast: true,
        position: 'top-end',
        showConfirmButton: false
    });
</script>
@endif