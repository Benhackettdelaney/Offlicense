<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Distillery Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <!-- this is a success alert that will show when the edit has been successful -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">

                <!-- when clicking this edit button it is routed to the distillery edit page -->
                <a href="{{ route('admin.distilleries.edit', $distillery) }}" class="btn-link ml-auto">Edit</a>

                <!-- this is the delete function and the button together -->
                <form action="{{ route('admin.distilleries.destroy', $distillery) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>
                    <!-- the information that will display on the page, can be edited or deleted, it will display when clicked to edit by an admin -->
                        <tr>
                            <td class="font-bold ">ID  </td>
                            <td>{{ $distillery->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Name  </td>
                            <td>{{ $distillery->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Address  </td>
                            <td>{{ $distillery->address }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>