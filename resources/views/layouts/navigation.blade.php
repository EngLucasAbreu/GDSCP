<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->

        </div>
    </div>
    <style>
        .btn-hover-custom:hover {
            color: #000000 !important;
            background-color: #ebebeb !important;
        }
        .text-hover:hover {
            color: #000000 !important;
        }
    </style>
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-custom">

        <!-- Responsive Settings Options -->

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="btn btn-sm btn-light btn-hover-custom rounded border shadow-sm mr-4">
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                    class="tx-custom d-flex align-items-center justify-content-center text-hover">
                    {{ __('Desconectar') }}
                    <ion-icon name="power-outline" class="m-2"></ion-icon>
                </x-responsive-nav-link>
            </button>
        </form>
    </div>
    </div>
    </div>
</nav>
