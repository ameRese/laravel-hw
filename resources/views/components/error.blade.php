@props(['error'])
@if ($error)
    <div class="p-4 m-2 rounded bg-red-100">
        {{ $error }}
    </div>
@endif
