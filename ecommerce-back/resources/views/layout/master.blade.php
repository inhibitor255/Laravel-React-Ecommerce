<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce Admin</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main>
        <div class=" mx-auto px-5">
            <div class=" p-6 shadow">
                <div class=" grid grid-rows-1 grid-cols-12">
                    <div class=" col-span-3">
                        <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg  ">
                            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg ">
                                Category
                            </li>
                            <li class="w-full px-4 py-2 border-b border-gray-200 ">Product</li>
                            <li class="w-full px-4 py-2 border-b border-gray-200 ">Order</li>
                        </ul>
                    </div>
                    <div class=" col-span-9 ">
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow ">
                            @if (session()->has('success'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 " role="alert">
                                    <span class="font-medium">{{ session()->get('success') }}</span>
                                </div>
                            @endif
                            @if ($errors->all())
                                @foreach ($errors->all() as $e)
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200 " role="alert">
                                        <span class="font-medium">{{ $e }}</span>
                                    </div>
                                @endforeach
                            @endif
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
</body>

</html>
