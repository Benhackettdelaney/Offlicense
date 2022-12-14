<!-- this is the button to edit the drinks -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Drink') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <!-- The route is books.update, this route defined in web.php calls BookController:update() function -->
                <!-- this code below displays onto the website in the create section the name, price, name and alcohol level -->
                <form action="{{ route('drinks.update', $drink) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    autocomplete="off"
                   ></x-text-input>

                <x-text-input
                    type="text"
                    name="price"
                    field="price"
                    placeholder="price..."
                    class="w-full mt-6"
                    :value="@old('category', $drink->price)"></x-text-input>

        

                <x-text-input
                    type="text"
                    name="quantity"
                    field="quantity"
                    placeholder="quantity..."
                    class="w-full mt-6"
                    :value="@old('author',$drink->quantity)"></x-text-input>

                    <x-text-input
                    type="text"
                    name="alcohol_level"
                    field="alcohol_level"
                    placeholder="alcohol level..."
                    class="w-full mt-6"
                    :value="@old('author',$drink->alcohol_level)"></x-text-input>

            <!-- button used to save the drink after it has been edited -->
               <x-primary-button class="mt-6">Save Drink</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
