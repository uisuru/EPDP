<ul class="navbar-nav ml-auto">
    @foreach($items as $menu_item)
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu_item->url }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach
</ul>
