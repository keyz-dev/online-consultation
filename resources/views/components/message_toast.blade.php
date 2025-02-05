<script type="text/javascript" src="{{asset('js/product.js')}}" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session()->has('status'))
            showNotification('{{ session('message') }}', '{{session('status')}}');
            {{ session()->forget('status') }}
            {{ session()->forget('message') }}
        @endif
    });
</script>

<div id="notification-container" class="container relative w-full">
<!-- Notifications will appear here -->
</div>