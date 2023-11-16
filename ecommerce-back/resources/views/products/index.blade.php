@extends('layout.master')

@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('products.create') }}"
            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Create
        </a>
    </div>
    <div class="container mx-auto p-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-4 py-5 border border-slate-600">Image</th>
                    <th class="px-4 py-5 border border-slate-600">Name</th>
                    <th class="px-4 py-5 border border-slate-600">Price</th>
                    <th class="px-4 py-5 border border-slate-600">Description</th>
                    <th class="px-4 py-5 border border-slate-600">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <td class="px-2 py-2 border border-slate-600 font-medium text-gray-900 whitespace-nowrap">
                            <img src="{{ asset('images/' . $p->image) }}" class=" w-[150px]" alt="{{ $p->image }}"
                                title="{{ $p->image }}">
                        </td>
                        <td class="px-2 py-2 border border-slate-600 font-medium text-gray-900 whitespace-nowrap">
                            {{ $p->name }}
                        </td>
                        <td class="px-2 py-2 border border-slate-600 font-medium text-gray-900 whitespace-nowrap">
                            {{ $p->price }}
                        </td>
                        <td class="px-2 py-2 border border-slate-600 font-medium text-gray-900 whitespace-nowrap">
                            {{ $p->description }}
                        </td>
                        <td class="px-2 py-2 border border-slate-600">
                            <a href="{{ route('products.edit', $p->id) }}"
                                class="text-white bg-purple-500 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center my-2 mx-1">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $p->id) }}" method="POST"
                                onsubmit="return confirm(`Are you sure to delete?`)"
                                class="text-white inline bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center my-2 mx-1">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" w-full">
            {{ $products->links('pagination::tailwind') }}
        </div>

    </div>
@endsection
