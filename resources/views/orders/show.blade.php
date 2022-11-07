
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mb-1">
            Order Number : {{ $order->id }}
        </h1>

        <p>
            Order By {{ $order->customer->firstname }} {{ $order->customer->lastname }}
        </p>
        <p> Quantity : {{ $order->product_qty }}</p>
        <p>Order Price : {{ $order->order_price }}฿</p>
        <p>Customer Need Date : {{ $order->customer_need_date }}</p>

        @if ($order->products)
            <section class="mt-8 mx-16">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                    @foreach($statuses as $status)

                        @if ($status->id == $order->order_status_id)
                            <p id="status" class="text-red-500">
                                {{ $status->order_status_process }}
                            </p>
                        @endif
                    @endforeach
                </h5>
                @if($order->order_status_id != null and old('status', $order->order_status_id) != 4)
                    <form action="{{ route('orders.updatestatus', $order)}}" method="post">
                        @csrf
                        <select name ="status" id="status" class="form-control border-gray-300 relative z-0 mb-6 w-1/4 group">
                            @foreach($statuses as $status)
                                @if ($order->order_status_id != null and old('status', $order->order_status_id) == $status->id)
                                    <option value="{{$status->id}}" selected>{{$status->order_status_process}}</option>
                                    @continue ;
                                @endif
                                <option value="{{$status->id}}">{{$status->order_status_process}}</option>
                            @endforeach
                        </select>
                        <div class="p-2">
                            <button type="submits" class="button border border-gray-200 py-2 px-2 rounded">บันทึกสถานะ</button>
                        </div>
                    </form>
                @endif
                @endif
            </section>
    </article>
    <div class="relative py-4">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-b border-gray-300"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="bg-white px-4 text-sm text-gray-500">Product ({{ $order->products->count() }})</span>
        </div>
    </div>

    @foreach($order->products as $product)
        <div class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                Product ID : {{ $product->id }}  {{ $product->name }}
            </h5>
            <p>Height : {{ $product->height }}    |    Width : {{ $product->width }}</p>
            @if($product->description != "")
                <p>Description : {{ $product->description }}</p>
            @else
                <p>Description : - </p>
            @endif
            <p>Price : {{ $product->price }}฿</p>
        </div>
    @endforeach

    @if($order->products->count() < $order->product_qty)
        <section class="mx-16 mt-8">
            <form action="{{ route('orders.products.store', ['order' => $order->id]) }}" method="post">
                @csrf
                <div>
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Product
                    </label>
                    <select name="product" id="product">
                        <option value="มังกร">มังกร</option>
                        <option value="มังกรประดับทีกง" selected>มังกรประดับทีกง</option>
                    </select>
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

    @if($order->orderStatus->order_status_process == 'รอจัดส่ง')
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Delivery Note</span>
            </div>
        </div>
        <div class="mx-8">
            <p>Address: {{ $order->customer->address }} {{ $order->customer->province->province_name }} {{ $order->customer->postal_code }}</p>
            <p>Phone Number: {{ $order->customer->phone_number }}</p>
        </div>
        <section class="mt-8 mx-16">
            <form action="{{ route('orders.delivery.note.store', ['order' => $order->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="relative z-0 mb-6 w-full group">
                <label for="delivery_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Delivery Date
                </label>
                @if ($errors->has('delivery_date'))
                    <p class="text-red-500">
                        {{ $errors->first('delivery_date') }}
                    </p>
                @endif
                <input type="date" name="delivery_date" id="delivery_date"
                       class="bg-gray-50 border @if($errors->has('delivery_date')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('delivery_date') }}"
                       placeholder="" required >

            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="delivery_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Description
                </label>
                @if ($errors->has('delivery_description'))
                    <p class="text-red-500">
                        {{ $errors->first('delivery_description') }}
                    </p>
                @endif
                <input type="text" name="delivery_description" id="delivery_description"
                       class="bg-gray-50 border @if($errors->has('delivery_description')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('delivery_description') }}"
                       placeholder="" required>
            </div>
                <div class="add-image-button">
                    <div>
                        <label class="create-text">Picture :</label>
                        <input class="create-text" type="file" name="image" class="form-control">
                        @error('image')
                        <div  class="alert alert-danger mt-1 mb-1">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="app-button">Submit</button>
                </div>
            </form>

        </section>
    @endif

    @if($order->orderStatus->order_status_process == 'จัดส่งสำเร็จ')
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Delivery Note</span>
            </div>
        </div>
        <div class="mx-8">
            <p>Address: {{ $order->customer->address }} {{ $order->customer->province->province_name }} {{ $order->customer->postal_code }}</p>
            <p>Phone Number : {{ $order->customer->phone_number }}</p>
            <p>Delivery Date : {{ $order->deliveryNote->delivery_date }}</p>
            @if($order->deliveryNote->delivery_description != "")
                <p>Description : {{ $order->deliveryNote->delivery_description }}</p>
            @else
                <p>Description : - </p>
            @endif

            @if($order->deliveryNote->image != "")
                <img src="{{ asset("/storage/images/".$order->deliveryNote->image) }}" width="20%" height="20%">
            @endif
        </div>
    @endif

    @if($order->problems->count() > 0)
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Problem ({{ $order->problems->count() }})</span>
            </div>
        </div>
        <section class="mx-16">
            @foreach($order->problems as $problem)
                <div>
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                         {{ $problem->problem_description }}
                    </p>
                </div>
            @endforeach
        </section>
    @endif

@endsection

