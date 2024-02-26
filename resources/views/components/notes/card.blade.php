<div class="flex flex-col">
    <div class="max-w-2xl h-full overflow-hiddenshadow-md bg-[ {{$note->color}} ]">
        @if($note->image)
            <img class="object-contain sm:object-cover w-full h-32" src="{{ $note->image }}" alt="{{ $note->title }}">
        @else
            <div class="w-full h-32"></div>
        @endif

        <div class="p-6">
            <div>
                <span class="text-xs font-medium text-blue-600 uppercase">Category/Tags</span>
                <a href="{{ route('notes.show', $note) }}"
                   class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform hover:text-gray-600 hover:underline"
                   tabindex="0" role="link">{{ $note->title }}</a>
                <p class="mt-2 text-sm text-gray-600">{{ Str::limit($note->description, 100, $end="...") }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4 px-5 pb-5">
        <div class="flex items-center justify-between">
            <span class="mx-1 text-xs text-gray-600">{{ $note->created_at->format('h:iA') }}</span>
            <span class="mx-1 text-xs text-gray-600">{{ $note->created_at->format('d F Y') }}</span>

        </div>
    </div>
    <div class="rounded-b px-5 pb-5 flex justify-end gap-2 bg-[ {{$note->color}} ]">
        <a href="{{ route('notes.edit', $note) }}">
            <button
                class="rounded-full bg-gray-200 w-10 h-10 hover:bg-green-500 hover:text-white transition-all ease-in-out duration-200
                bg-[{{ $note->color }}]"
            >
                <i class="bi bi-pencil-fill"></i>
            </button>
        </a>
        <form id="delete-form-{{ $note->id }}" class="inline" method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="event.preventDefault()">
            @method('DELETE')
            @csrf
            <button onclick="makeAlert({{ $note->id }})"
                    type="submit"
                    class="rounded-full bg-gray-200 w-10 h-10 hover:bg-red-500 hover:text-white transition-all ease-in-out duration-200
                    bg-[{{ $note->color }}]"
            >
                <i class="bi bi-trash-fill"></i>
            </button>
        </form>
    </div>
</div>

<script>
    function makeAlert(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                // Swal.fire({
                //     title: "Deleted!",
                //     text: "Your file has been deleted.",
                //     icon: "success"
                // });
            }
        });
    }
</script>


