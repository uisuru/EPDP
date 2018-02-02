<div class="post-preview">
        <table><!--style="width:100%"-->
        <tr>
            <th class="post-preview">
                <a href="/post/{{$post -> slug}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{$post->excerpt}}
                    </h3>
                </a>
            </th>
            <th class="post-preview">
                <!--{{url()->current()}}#{{$post -> slug}}-->
    <div style="display: none;width:80%;height: 80%;" id="{{$post -> slug}}">

        <h3>{{$post->title}}</h3>
        <?php
        $content= $post->bodyImage;
        echo $content;/*no html tags in popup*/
        ?>
        <?php
        $content= $post->body;
        echo $content;/*no html tags in popup*/
        ?>
        @foreach($post->answers as $answer)
            @if($answer->approved)
                <div class="card w-100">
                    <div class="card-header" style="padding: .5rem 0.2rem;margin-bottom: 5px;">
                        Answered at
                        {{$answer->updated_at->format("F j, Y, g:i a")}}
                        By <a href="/profile/{{$answer -> author ->username}}">{{$answer->author->name}}</a>
                    </div>
                    <div class="card-block" style="margin-top: 10px">
                        {!!html_entity_decode($answer->answer)!!}
                    </div>
                </div>
                <hr style="height: 1px;margin-bottom:10px;margin-top:30px;background-image: -webkit-linear-gradient(left,  #656565, #d1e0e9);"/>
            @endif
        @endforeach
    </div>
            </th>
        </tr>
    </table>
    <p>
        <?php
        $content= $post->body;
        $result = substr($content, 0, 500);
        echo $result."......Click Read More Button";
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

