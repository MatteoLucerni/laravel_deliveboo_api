@if (session('toast-message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast show bg-orange-light" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-orange-strong">
                <img class="toast-image me-2" src="{{ asset('Yummy_Food.svg') }}" class="rounded me-2" alt="...">
                <strong class="me-auto">DeliveBoo</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body text-white ">
                {{ session('toast-message') }}
            </div>
        </div>
    </div>
    <script>
        const toast = document.getElementById('liveToast')
        setTimeout(() => {
            toast.classList.remove('show')
        }, 5000);
    </script>
@endif
