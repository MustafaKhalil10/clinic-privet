@props([])

<div id="sidebar">
    <div class="sidebar-header mt-4">
        <h3><img style="border-radius: 50px" src="{{ asset('img/logo.jpg') }}" class="img-fluid" />
            <span>private clinic</span></h3>
    </div>

    <ul class="list-unstyled component m-0">

        @foreach ($items as $item)
            <li class="{{ $active == $item['route'] ? 'active' : '' }}">
                <a href="{{ route($item['route']) }}" class=""><i
                        class="material-icons">{{ $item['icon'] }}</i>{{ $item['title'] }}</a>
            </li>
        @endforeach

    </ul>
</div>
