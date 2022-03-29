    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl ">
        <!-- Categories list -->

        <x-dropdown>
            <x-slot name="trigger">
                <button class="flex lg:inline-flex bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left">
                    {{ isset($currentCategory) ? $currentCategory->name : 'Categories'}}
                    <x-icon name="down-arrow" style="right: 12px;" class="absolute pointer-events-none"/>
                </button>
            </x-slot>
                <x-dropdown-item href="/?{{http_build_query(request()->except('category','page')) }}" :active="request()->routeIs('home') and !isset($currentCategory) ? true : false">
                    ALL
                </x-dropdown-item>
                @foreach($categories as $category)
                <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                    :active="(isset($currentCategory) and $currentCategory->is($category)) ? true : false">
                    {{ $category->name }}
                </x-dropdown-item>
                @endforeach
        </x-dropdown>

    </div>
