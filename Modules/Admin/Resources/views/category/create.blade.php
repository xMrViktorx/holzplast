@extends('admin::layouts.navigation')

@section('content')
    <div class="bg-white p-6 shadow-md sm:rounded-lg">
        <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Név <span class="text-red-700">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('name')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Elérési útvonal <span class="text-red-700">*</span></label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('slug')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="inline-flex relative items-center mb-4 cursor-pointer">
                    <input type="checkbox" name="status" id="status" value="1" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900">Aktív</span>
                </label>
                @error('status')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Mentés</button>
        </form>
    </div>

    <script type="text/javascript">
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        nameInput.addEventListener('keyup', () => {
            const name = nameInput.value;
            const slug = name
                .toString()
                .trim()
                .toLowerCase()
                .replace(/á/g, "a")
                .replace(/é/g, "e")
                .replace(/í/g, "i")
                .replace(/ó/g, "o")
                .replace(/ö/g, "o")
                .replace(/ü/g, "u")
                .replace(/ű/g, "u")
                .replace(/\s+/g, "-")
                .replace(/[^\w\-]+/g, "")
                .replace(/\-\-+/g, "-")
                .replace(/^-+/, "")
                .replace(/-+$/, "");

            slugInput.value = slug;
        });
    </script>
@endsection
