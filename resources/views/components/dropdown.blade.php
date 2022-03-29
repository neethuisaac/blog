@props (['trigger'])
<div x-data="{ show: false }" @click.away=" show = false" class="relative">

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="absolute w-full bg-gray-100 rounded-xl z-50" style="display:none">
        {{ $slot }}
    </div>

</div>
