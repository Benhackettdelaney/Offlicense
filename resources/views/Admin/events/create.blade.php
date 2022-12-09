<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>
                        
                        <x-text-input
                        type="text"
                        name="address"
                        field="address"
                        placeholder="address"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('address')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="bio"
                        field="bio"
                        placeholder="bio"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('bio')"></x-text-input>

                    <x-primary-button class="mt-6">Save event</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>