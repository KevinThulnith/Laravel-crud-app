<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add New Product') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900">
								{{ __('Add New Product') }}
							</h2>
			
							<p class="mt-1 text-sm text-gray-600">
								{{ __('Fill the form and submitt.') }}
							</p>
						</header>

						<form method="post" action="{{route('products.store')}}" class="mt-6 space-y-6">
							@csrf
			
							<div>
								<x-input-label for="name" :value="__('Product Name')" />
								<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="name" required/>
                @error('name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
							</div>

							<div>
								<x-input-label for="price" :value="__('Product Price')" />
								<x-text-input id="price" name="price" type="text" class="mt-1 block w-full" placeholder="XXX.XX"  pattern="^\d+(\.\d{2})?$" title="Enter a number with up to two digits after the decimal point." required/>
                @error('price')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
							</div>

							<div>
                <x-input-label for="quantity" :value="__('Product Quantity')" />
                <x-text-input id="quantity" name="quantity" type="text" class="mt-1 block w-full" placeholder="XXX" pattern="\d*" title="Only numbers are allowed" required/>
                @error('quantity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
							</div>
              
              <div>
                <x-input-label for="description" :value="__('Product Description')" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" placeholder="description" required/>
                @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
              </div>
							
							<div>
								<button type="submit" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
							</div>
						</form>
					</section>
        </div>
      </div>
    </div>
	</div>
</x-app-layout>