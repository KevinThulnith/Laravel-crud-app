<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('View Products') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
                  <section>
                      <header>
                          <a href="{{ route('products.create') }}" class="bg-gray-500 text-white py-2 px-4 rounded inline-block text-center hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                              <i class="fa fa-plus" aria-hidden="true" style="margin-right: 10px"></i>Add New Product
                          </a>
                          @if (session()->has('success'));
                            <div class="div">
                                <p class="mt-1 text-base text-gray-600 mt-4">{{session('success')}}</p>
                            </div>    
                          @endif                            
                      </header>
                      <table class="mt-4 min-w-full table-auto bg-white border-collapse" style="overflow: hidden; scroll: auto;">
                          <thead>
                              <tr class="bg-gray-100">
                                  <th class="px-4 py-2 border-b text-left">ID</th>
                                  <th class="px-4 py-2 border-b text-left" style="min-width: 140px">Name</th>
                                  <th class="px-4 py-2 border-b text-left">Pice</th>
                                  <th class="px-4 py-2 border-b text-left">Quantity</th>
                                  <th class="px-4 py-2 border-b text-left" style="min-width: 240px">Description</th>
                                  <th class="px-4 py-2 border-b text-left">Action</th>
                                  <th class="px-4 py-2 border-b text-left">Manage</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($products as $item)
                                  <tr>
                                    <td class="px-4 py-2 border-b">{{$item->id}}</td> 
                                    <td class="px-4 py-2 border-b">{{$item->name}}</td>
                                    <td class="px-4 py-2 border-b text-right">{{$item->price}}</td>
                                    <td class="px-4 py-2 border-b text-right">{{$item->quantity}}</td>
                                    <td class="px-4 py-2 border-b">{{$item->description}}</td>
                                    <td class="px-4 py-2 border-b">
                                      <a href="{{route('product.edit', ['product' => $item])}}" class="bg-orange-500 text-white py-1 px-4 rounded inline-block text-center hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Update</a>
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                      <form action="{{route('product.delete', ['product' => $item])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="bg-red-500 text-white py-2 px-4 rounded inline-block text-center hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                      </form>
                                    </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>                        
                  </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>