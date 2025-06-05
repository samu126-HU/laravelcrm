@if (session('success'))
    <div class="p-4 bg-green-100 text-green-800 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
