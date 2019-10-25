<ul class="navbar-nav ml-auto">
    @foreach($items as $menu_item)
        <li class="nav-item">
            <a class="nav-link" href={{ env('APP.URL') }}"/{{ $menu_item->url }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach

        <li class="nav-item">
        <button type="button" style="color:#a7d98d; padding: 7px 0px; font-weight: bold; font-size: 14px; background-color: #868e9600;border-color: #868e9600;" class="nav-link btn btn-secondary" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="
        <div class='card'>
                    <div class='card-body'>

                                <h4 class='mb-0 text-truncated' style='text-transform: uppercase;'></i> {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                        <p class='lead'>{{ Auth::user()->email }}</p>
                        <p align='middle'><img height='150' width='150' src='/storage/{{ Auth::user()->avatar }}' alt='Avatar not Found or Load Error' class='rounded-circle'></p>

                        <a style=' text-decoration: inherit;color: inherit;color: inherit;' href='{{ url('/dashboard') }}'>
                         <button class='btn btn-block btn-outline-info'><span class='fa fa-tachometer'></span> Goto Dashboard</button></a>

                        <a style=' text-decoration: inherit;color: inherit;color: inherit;' href='{{ url('/profile') }}'>
                         <button class='btn btn-block btn-outline-success'><span class='fa fa-sign-out'></span> Edit My Profile</button></a>

                        <a style=' text-decoration: inherit;color: inherit;color: inherit;' href='{{ url('/logout') }}'>
                         <button class='btn btn-block btn-outline-danger'><span class='fa fa-sign-out'></span> Log Out</button></a>
            </div>
            <!--/card-block-->
        </div>
        ">
            <i class="fa fa-user" aria-hidden="true"></i>
            {{ Auth::user()->username }}
        </button>
        <script>
            $(document).ready(function(){
                $("[data-toggle=popover]").popover();
            });
        </script>
        </li>
</ul>
