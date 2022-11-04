{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mb-1">
            Order Number : {{ $order->id }}
        </h1>

        <p>
            Order By {{ $order->customer->firstname }} {{ $order->customer->lastname }}
        </p>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Product ({{ $order->products->count() }})</span>
            </div>
        </div>

    </article>

    @if ($order->products)
        <section class="mt-8 mx-16">
            @foreach($order->products as $product)
                {{--                <a href="{{ route('orders.show', ['order' => $order->id]) }}"--}}
                {{--                   class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">--}}
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                    {{ $product->id }} : {{ $product->name }}
                </h5>
                {{--                </a>--}}
            @endforeach
        </section>
    @endif

    @if($order->products->count() < $order->product_qty)
        <section class="mx-16 mt-8">
            <form action="{{ route('orders.products.store', ['order' => $order->id]) }}" method="post">
                @csrf

                <div class="relative z-0 mb-6 w-full group">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Name
                    </label>
                    @if ($errors->has('name'))
                        <p class="text-red-500">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <input type="text" name="name" id="name"
                           class="bg-gray-50 border
                       @if($errors->has('name'))
                       border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('name') }}"
                           placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Description
                    </label>
                    @if ($errors->has('description'))
                        <p class="text-red-500">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <input type="text" name="description" id="description"
                           class="bg-gray-50 border @if($errors->has('description')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('description') }}"
                           placeholder="">
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Height
                    </label>
                    @if ($errors->has('height'))
                        <p class="text-red-500">
                            {{ $errors->first('height') }}
                        </p>
                    @endif
                    <input type="number" name="height" id="height" min="6" max="15"
                           class="bg-gray-50 border @if($errors->has('height')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('height') }}"
                           placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="width" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Width
                    </label>
                    @if ($errors->has('width'))
                        <p class="text-red-500">
                            {{ $errors->first('width') }}
                        </p>
                    @endif
                    <input type="number" name="width" id="width" min="0" max="2" step="0.10"
                           class="bg-gray-50 border @if($errors->has('width')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('width') }}"
                           placeholder="" required>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Price
                    </label>
                    @if ($errors->has('price'))
                        <p class="text-red-500">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                    <input type="number" name="price" id="price"
                           class="bg-gray-50 border @if($errors->has('price')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('price') }}"
                           placeholder="" required>
                </div>

                <div class="mt-2">
                    <button type="submit" class="app-button">Add Product</button>
                </div>

            </form>
        </section>

    @endif

{{--    add product--}}
{{--    <section class="mx-16 mt-8">--}}
{{--        <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="post">--}}
{{--            @csrf--}}
{{--            <div>--}}
{{--                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>--}}
{{--                <textarea name="message" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>--}}
{{--            </div>--}}
{{--            <div class="mt-2">--}}
{{--                <button type="submit" class="app-button">Comment</button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </section>--}}


@endsection

