<x-app-layout
    title="Edit"
>
    <div class="container mx-auto">
        <button class="w-10 h-10 rounded-full mr-5 border border-black" style="background: {{ $note->color }}"></button>
        <h1 class="inline text-5xl mb-5">{{ $note->title }} - {{ $note->created_at->format('d F Y') }}</h1>

        @if($note->description || $note->image)
            <section class="p-6 bg-white rounded-md shadow-md">
                @if($note->image)
                    <img class="object-contain w-full h-64" src="{{ $note->image }}" alt="{{ $note->title }}">
                @endif
                @if($note->description)
                    <div class="mt-5">
                        <h2 class="text-3xl font-bold">Description:</h2>
                        <hr/>
                        <p class="mt-5">{{ $note->description }}</p>
                    </div>
                @endif
            </section>
        @endif
    </div>
</x-app-layout>
