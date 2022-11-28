<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Drink') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.drinks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="name"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                    <x-text-input
                        type="pice"
                        name="price"
                        field="price"
                        placeholder="price..."
                        class="w-full mt-6"
                        :value="@old('price')"></x-text-input>

                    <x-textarea
                        name="quantity"
                        rows="10"
                        field="quantity"
                        placeholder="quantity..."
                        class="w-full mt-6"
                        :value="@old('quantity')"></x-textarea>

                    <x-text-input
                        type="alcohol_level"
                        name="alcohol_level"
                        field="alcohol_level"
                        placeholder="alcohol level..."
                        class="w-full mt-6"
                        :value="@old('alcohol_level')"></x-text-input>

                    

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <select name="publisher_id">
                          @foreach ($publishers as $publisher)
                            <option value="{{$publisher->id}}" {{(old('publisher_id') == $publisher->id) ? "selected" : ""}}>
                              {{$publisher->name}}
                            </option>
                          @endforeach
                     </select>


                    <x-primary-button class="mt-6">Save Drink</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>