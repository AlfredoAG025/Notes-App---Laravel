<x-app-layout
    title="Edit"
>
    <div class="container mx-auto">
        <h1 class="text-5xl mb-5">Edit Note</h1>

        <section class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 capitalize">Note Form</h2>

            <form method="POST" action="{{ route('notes.update', $note) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 gap-6 mt-4">
                    @include('notes.forms-fields')
                </div>

                <div class="flex justify-end mt-6 gap-4">
                    <a href="{{ route('notes.index') }}"
                       class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Update
                    </button>
                </div>
            </form>
        </section>

    </div>
</x-app-layout>
