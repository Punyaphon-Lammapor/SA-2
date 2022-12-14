<aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
    <nav class="flex flex-col bg-orange-400 rounded">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ url('/') }}" class="flex items-center">
                <span class="self-center ml-4 text-3xl font-bold whitespace-nowrap">DRAGON</span>
            </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="inline-flex w-full md:block md:w-auto " id="navbar-default">
            <ul class=" items-center flex flex-col p-4 mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium ">
                @auth
                    @if(Auth::user()->role == 'OWNER' or Auth::user()->role == 'EMPLOYEE'or Auth::user()->role == 'DELIVERY')
            <li>
                <a href="{{ route('orders.index') }}"
                    class="text-xl font-semibold block py-2 pr-4 pl-3 rounded border-gray-400 md:p-0 hover:underline @if(Route::currentRouteName() === 'orders.index') current-page @endif" >
                    Orders
                </a>
            </li>

                        <li>
                            <a href="{{ route('reports.index') }}"
                               class="text-xl font-semibold block py-2 pr-4 pl-3 rounded border-gray-400 md:p-0 hover:underline @if(Route::currentRouteName() === 'reports.index') current-page @endif" >
                                Order Report
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('problemreports.index') }}"
                               class="text-xl font-semibold block py-2 pr-4 pl-3 rounded border-gray-400 md:p-0 hover:underline @if(Route::currentRouteName() === 'problemreports.index') current-page @endif" >
                                Problem Report
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'OWNER')
            <li>
                <a href="{{ route('materials.index') }}"
                class="text-xl font-semibold block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'materials.index') current-page @endif">
                Materials
            </a>
            </li>
                <li>
                    <a href="{{ route('customers.index') }}"
                    class="text-xl font-semibold block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'customers.index') current-page @endif" >
                    Customer
                </a>
            </li>
            </li>
                        @endif
                <li>
                    <a href="{{ route('problems.index') }}"
                    class="text-xl font-semibold block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'problems.index') current-page @endif" >
                    Problems
                </a>
            </li>

                <li class="text-xl font-semibold">
                    {{ Auth::user()->email }}
                </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                class="text-xl font-semibold">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}"
                        class="text-xl font-semibold block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif" >
                        Login
                    </a>
                </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>

