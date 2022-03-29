@if(session()->has('success'))
<div
    x-data="{ show : true }"
    x-init="setTimeout(() => show = false,5000)"
    x-show="show"
    class='fixed bg-blue-500 text-white p-10 bottom-3 right-3 rounded-xl'>
    <p>{{ session('success') }}<p>
</div>
@endif
