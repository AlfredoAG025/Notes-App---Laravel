<x-app-layout
    title="Home"
>
    <div class="container mx-auto">
        <h1 class="text-5xl mb-5">Notes</h1>

        @if(session('status'))
            <script type="module">
                Toastify({
                    text: "{{ session('status') }}",
                    duration: 3000,
                    destination: "",
                    newWindow: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "bg-green-500 w-full",
                    onClick: function() {} // Callback after click
                }).showToast();
            </script>
        @endif

        <div class="grid grid-cols-1 px-5 sm:px-0 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($notes as $note)
                <x-notes.card :note="$note"></x-notes.card>
            @endforeach
        </div>
    </div>

</x-app-layout>
