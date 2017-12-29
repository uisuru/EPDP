<div class="post-preview">
    <table><!--style="width:100%"-->
        <tr>
            <th class="post-preview">
                <a href="/post/{{$post -> slug}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <!--
                    <h3 class="post-subtitle">
                        {$post->excerpt}}
                    </h3>
                    -->
                </a>
            </th>
            <th class="post-preview">
                <!--{{url()->current()}}#{{$post -> slug}}-->
    <div style="display: none;width:80%;height: 80%;" id="{{$post -> slug}}">
        <h3>{{$post->title}}</h3>

        <?php
        $content= $post->body;
        echo $content;/*no html tags in popup*/
        ?>

        <table style="position: absolute;bottom: 3%;">
            <tr>
                <th>
                    <p><button data-fancybox-close class="button">Close</button></p>
                </th>
                <th class="post-preview">
                        <p class="post-meta" style="margin-top: 8px">Asked by
                            <a href="/profile/{{$post -> author->username}}" >{{$post->author->name}}</a>
                            on {{$post->created_at->format('F d, Y')}}
                        </p>
                </th>
            </tr>
        </table>
    </div>
            </th>
        </tr>
    </table>
    <p>
        <?php
        $content= $post->body;
        $result = substr($content, 0, 150);
        echo $result;
        ?>
    </p>
    <p class="post-meta">Asked by
        <a href="/profile/{{$post -> author->username}}">{{$post->author->name}}</a>
        on {{$post->created_at->format('F d, Y')}}

        <a href="/post/{{$post -> slug}}"><button class="button" style="vertical-align:middle;background: rgb(119, 185, 73);">
                <span>Read More...</span>
            </button></a>

        <a data-fancybox data-src="#" data-options='{"src": "#{{$post -> slug}}", "touch": false, "smallBtn" : false}' href="javascript:;">
            <button class="button" style="vertical-align:middle;"><span>Instant Popup</span></button>
        </a>
    </p>
</div>
<hr>

