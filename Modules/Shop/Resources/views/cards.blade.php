<div class="pt-32 flex flex-wrap justify-center gap-6">
    @if (count($products))
        @foreach ($products as $product)
            <div class="w-96 max-h-[38rem] rounded overflow-hidden shadow-lg flex flex-col mb-8">
                <div class="relative pb-80 overflow-hidden">
                    <img class="absolute h-full w-full object-cover hover:scale-125 ease-in-out duration-500" src="{{ url($product->productImage->path) }}" alt="">
                </div>
                <div class="flex-1 px-6 py-4 flex flex-col justify-between">
                    <div>
                        <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                        <div class="text-base line-clamp-5">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-6">
                        <div class="font-bold text-2xl mb-2">{{ formatPrice($product->price) }}</div>
                        <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="bg-backgroundNavbar px-8 py-2 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain">Megrendelés</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex justify-center items-center flex-col mt-6">
            <div class="font-bold text-2xl mb-2">Jelenleg nincs elérhető termék az adott kereséssel</div>
            <a href="/" class="bg-backgroundNavbar w-min px-8 py-2 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain">Vissza</a>
        </div>
    @endif
</div>
