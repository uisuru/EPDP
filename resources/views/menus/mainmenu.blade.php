<ul class="navbar-nav ml-auto">
    @foreach($items as $menu_item)
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu_item->url }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach

        <li class="nav-item">
        <button type="button" style="padding: 7px 15px;background-color: #868e9600;border-color: #868e9600;" class="btn btn-secondary" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="
        <div class='card'>
                    <div class='card-body'>

                                <h3 class='mb-0 text-truncated' style='text-transform: uppercase;'></i> {{ Auth::user()->name }}</h3>
                        <p class='lead'>Web / UI Designer</p>

                        <img src=' /storage/{{ Auth::user()->avatar }}' alt='' class='mx-auto rounded-circle img-fluid'>
                        <a style=' text-decoration: inherit;color: inherit;color: inherit;' href='{{ url('/logout') }}'>
                         <button class='btn btn-block btn-outline-danger'><span class='fa fa-sign-out'></span> Log In</button></a>
            </div>
            <!--/card-block-->
        </div>
        ">
            <i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->name }}
        </button>
        <script>
            $(document).ready(function(){
                $("[data-toggle=popover]").popover();
            });
        </script>
        </li>
</ul>
