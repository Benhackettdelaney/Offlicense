<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Drink') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <!-- The route is admin.books.update, this route defined in web.php calls BookController:update() function -->
                <form action="{{ route('admin.drinks.update', $drink) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('name', $drink->name)"
                   ></x-text-input>

                <x-text-input
                    type="text"
                    name="price"
                    field="price"
                    placeholder="price..."
                    class="w-full mt-6"
                    :value="@old('price', $drink->price)"></x-text-input>

                <x-text-input
                    type="text"
                    name="quantity"
                    rows="10"
                    field="quantity"
                    placeholder="quantity..."
                    class="w-full mt-6"
                    :value="@old('quantity', $drink->quantity)"></x-text-input>

                <x-text-input
                    type="text"
                    name="alcohol_level"
                    field="alcohol_level"
                    placeholder="alcohol level..."
                    class="w-full mt-6"
                    :value="@old('alcohol_level',$drink->alcohol_level)"></x-text-input>

               <x-primary-button class="mt-6">Save Drink</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>