<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Distilleries') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <a href="{{ route('admin.distilleries.create') }}" class="btn-link btn-lg mb-2">Add a Distillery</a>
            @forelse ($distilleries as $distillery)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.distilleries.show', $distillery) }}"> <strong> Distillery ID </strong> {{ $distillery->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong> Distillery Name </strong>
                        {{$distillery->name}} </h3>

                    </p>

                </div>
            @empty
            <p>No distilleries found</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{-- {{$distilleries->links()}} --}}
        </div>
    </div>
</x-app-layout>