@extends('layout.master')

@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('categories.create') }}"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Create
        </a>
    </div>
    <div class="container mx-auto p-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-4 py-5 border border-slate-600">Name</th>
                    <th class="px-4 py-5 border border-slate-600">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <td class="px-4 py-5 border border-slate-600 font-medium text-gray-900 whitespace-nowrap">
                            {{ $c->name }}
                        </td>
                        <td class="px-4 py-5 border border-slate-600">
                            <a href="#"
                                class="text-white bg-purple-500 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center my-2 mx-1">
                                Edit
                            </a>
                            <a href="#"
                                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center my-2 mx-1">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" w-full">
            {{ $categories->links('pagination::tailwind') }}
        </div>

    </div>
@endsection
