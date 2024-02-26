<div>
    <label
        class="block text-sm text-gray-500"
        for="title"
    >Title <span class="text-red-500">*</span>
    </label>
    <input
        id="title"
        name="title"
        type="text"
        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
        autofocus placeholder="My New Note"
        value="{{ old('title', $note->title) }}"
    >
    @error('title')
    <span class="font-bold text-red-500">{{ $message }}</span>
    @enderror
</div>
<div>
    <label
        class="block text-sm text-gray-500"
        for="description"
    >
        Description
    </label>
    <textarea
        id="description"
        name="description"
        type="text"
        class="block  mt-2 w-full placeholder-gray-400/70 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
        placeholder="I'm gonna do this..."
        rows="10"
    >{{ old('description', $note->description) }}</textarea>
</div>

<div class="flex flex-col">
    <label
        class="block text-sm text-gray-500"
        for="color"
    >
        Color Note
    </label>
    <div>
        <input class="cursor-pointer" id="color" name="color" type="text" data-coloris
               value="{{ old('color', $note->color) }}">
    </div>
</div>

<div>
    <label for="image" class="block text-sm text-gray-500">Image</label>
    @if($note->image)
        <img class="object-contain w-full h-32" src="{{ $note->image }}" alt="{{ $note->title }}">
    @endif

    <input
        id="image"
        name="image"
        type="file"
        class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full placeholder-gray-400/70 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
        value="{{ old('image') }}"
    />
    @error('image')
    <span class="font-bold text-red-500">{{ $message }}</span>
    @enderror
</div>

<script>
    Coloris({
        theme: 'polaroid',
        swatches: [
            '#264653',
            '#2a9d8f',
            '#e9c46a',
            '#e76f51',
            '#d62828',
            '#07b',
            '#0096c7',
        ],
        swatchesOnly: true,
    });
</script>
