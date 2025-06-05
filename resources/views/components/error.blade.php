@if (session('error'))
    <div class="p-4 bg-red-100 text-red-800 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
