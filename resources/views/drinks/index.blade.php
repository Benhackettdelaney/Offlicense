<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Drinks') }}
        </h2>
    </x-slot>

    <!-- index is used to display the other functions on the website with the DrinkController -->
    <!-- connected to the create function to display a button that can add drinks to the website and the database -->

   
<!-- displays succes message after going onto the page from log in -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <a href="{{ route('drinks.create') }}" class="btn-link btn-lg mb-2">Add a Drink</a> 
            @forelse ($drinks as $drink)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('drinks.show', $drink) }}">{{ $drink->name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $drink->price }}
                      

                    </p>

                </div>
            @empty
            <p>No drinks yet</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{$drinks->links()}}
        </div>
    </div>
</x-app-layout>
