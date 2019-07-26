@foreach($sections as $section)
    <div class="my-2 ml-5 border-roundest p-4">
        <a class="text-dark" style="text-decoration: none;font-size:20px" href="/section/{{$section->id}}">
            <img src="/{{$section->avatar}}">
            <strong>{{$section->title}}</strong>
            @if($section->topics()->count())
                @php
                    $topic = $section->lastPost();
                    $post = $topic->posts()->latest()->first();
                @endphp
                <div class="float-right"><h1>{{count($topic->posts)}}</h1></div>
                <div class="float-right">{{$post->user->name}}</div>
                <div class="float-right">
                    @if($post->user->online)
                        <img src="/storage/user/on-off2.png">
                    @else
                        <img src="/storage/user/on-off1.png">
                    @endif
                </div>
                <div class="float-right">{{$post->updated_at}},</div>
                <div class="float-right pr-3"><h2>{{$topic->title}}</h2></div>
            @endif
        </a>
    </div>
@endforeach
