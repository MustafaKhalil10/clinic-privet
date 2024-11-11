@props(['type'])

@if (session()->has($type))
    <div class="alert alert-success m-3">
        {{ session($type) }}
    </div>
@endif
