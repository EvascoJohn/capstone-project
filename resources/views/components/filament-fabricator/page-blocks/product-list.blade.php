@aware(['page'])
@props([
    'product_list',
])
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
        @foreach ($product_list as $product)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block relative h-48 rounded overflow-hidden">
                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                </a>
                <div class="mt-4">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->unit_model }}</h2>
                <p class="mt-1">{{ $product->unit_srp }}</p>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </section>