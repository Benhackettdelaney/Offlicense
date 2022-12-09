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
            <!-- this is route from the index page to the create page in the distillery part of the site, it also is a route for the show so information can be displayed -->
            <a href="{{ route('admin.distilleries.create') }}" class="btn-link btn-lg mb-2">Add a Distillery</a>
            @forelse ($distilleries as $distillery)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.distilleries.show', $distillery) }}"> <strong> Distillery  </strong> {{ $distillery->name }}</a>
                    </h2>
                    <p class="mt-2">

                  <!-- shows and displays this infomation when viewing -->

                        <h3> <strong> Distillery Address </strong>
                        {{$distillery->address}} </h3>


                    </p>

                </div>
            @empty
            <p>No distilleries found</p>
            @endforelse
            <!-- this add a link to the paginate-->
            {{-- {{$distilleries->links()}} --}}
        </div>
    </div>
</x-app-layout>