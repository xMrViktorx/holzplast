@if ($message = Session::get('success'))
    <div class="text-white px-6 py-4 border-0 rounded fixed right-4 mb-4 bg-green-500 z-50">
        <span class="text-xl inline-block mr-5 align-middle">
            <i class="ri-notification-3-line"></i>
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">Siker!</b> {{ $message }}
        </span>
        <button id="closeAlert"
            class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
            onclick="closeAlert(event)">
            <span>×</span>

        </button>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
    setTimeout(function() {
        document.getElementById("closeAlert").click();
    }, 4000)
</script>
