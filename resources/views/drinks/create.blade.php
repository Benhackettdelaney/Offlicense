<!-- create is used for making new drinks, it will display on the website and on the database
 -->

 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Drink') }}
        </h2>
    </x-slot>
<!-- this is used for the create section where people can type the information they want to make a new drink -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('drinks.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name..."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                        <!-- displays the information on the the create pages where you would type the name, price,quantity and alcohol level -->

                        <x-text-input
                        type="text"
                        name="price "
                        field="price "
                        placeholder="Price ..."
                        class="w-full mt-6"
                        :value="@old('author')"></x-text-input>


                    <x-text-input
                        type="text"
                        name="quantity"
                        field="quantity"
                        placeholder="Quantity..."
                        class="w-full mt-6"
                        :value="@old('category')"></x-text-input>

                   
                    <x-text-input
                        type="text"
                        name="alcohol_level"
                        field="alcohol_level"
                        placeholder="alcohol level..."
                        class="w-full mt-6"
                        :value="@old('author')"></x-text-input>

                    <x-primary-button class="mt-6">Save Drink</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- button for create to save a drink that also saves to the website and database as a new drink -->