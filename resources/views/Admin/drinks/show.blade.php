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

                <!-- when EDIT BUTTON is clicked, route to admin.books.edit -->
                <a href="{{ route('admin.drinks.edit', $drink) }}" class="btn-link ml-auto">Edit</a>

                <!-- delete button is wrapped in a form, with the delete method. -->
                <form action="{{ route('admin.drinks.destroy', $drink) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                        <td rowspan="7">
                            <!-- use the asset function, access the file $book->book_image in the folder storage/images -->
                            <!-- <img src="{{asset('storage/images/' . $drink->book_image) }}" width="150" /> -->
                        </td>
                        </tr>
                        <tr>
                            <td class="font-bold ">name  </td>
                            <td>{{ $drink->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">price  </td>
                            <td>{{ $drink->price }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">quantity </td>
                            <td>{{ $drink->quantity }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">alcohol_level </td>
                            <td>{{ $drink->alcohol_level }}</td>
                        </tr>

                        <tr>
                            <td class="font-bold ">Distillery Name </td>
                            <td>{{ $drink->distillery->name }}</td>
                        </tr>

                        <tr>
                            <td class="font-bold ">Distillery Address </td>
                            <td>{{ $drink->distillery->address }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>