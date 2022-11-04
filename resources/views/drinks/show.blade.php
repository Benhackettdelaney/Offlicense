<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Drink Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--alert-success is a component which I created using php artisan make:component alert-success
            have a look at the code in views/components/alert-success.blade.php -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">

                <a href="{{ route('drinks.edit', $drink) }}" class="btn-link ml-auto">Edit</a>
                <form action="{{ route('drinks.destroy', $drink) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="font-bold ">Name  </td>
                            <td>{{ $drink->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Price  </td>
                            <td>{{ $drink->price }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Quantity </td>
                            <td>{{ $drink->quantity }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Alcohol Level </td>
                            <td>{{ $drink->alcohol_level }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
