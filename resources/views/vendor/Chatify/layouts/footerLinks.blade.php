{{-- <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script> --}}
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
        encrypted: false,
        forceTLS: false,
        cluster: "{{ config('chatify.pusher.options.cluster') }}",
        authEndpoint: '{{ route('pusher.auth') }}',
        wsHost: window.location.hostname,
        wsPort: 6001,
        auth: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });
</script>
<script src="{{ asset('js/chatify/code.js') }}"></script>
