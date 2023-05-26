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

