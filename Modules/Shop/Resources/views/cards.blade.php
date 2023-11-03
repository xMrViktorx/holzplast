<div class="pt-32 flex flex-wrap justify-center gap-6">
    @foreach ($products as $product)
        <div class="w-96 rounded overflow-hidden shadow-lg">
            <div class="relative pb-80 overflow-hidden">
                <img class="absolute h-full w-full object-cover hover:scale-125 ease-in-out duration-500" src="{{ url($product->productImage->path) }}" alt="">
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                <p class="text-gray-700 text-base">
                    {!! $product->description !!}
                </p>
                <div class="flex justify-between items-center mt-6">
                    <div class="font-bold text-2xl mb-2">{{ $product->price }} forint</div>
                    <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="bg-backgroundNavbar p-4 cursor-pointer">Megrendelés</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
