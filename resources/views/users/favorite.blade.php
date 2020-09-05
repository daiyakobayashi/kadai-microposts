@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::get($favorite->user->email,["size" => 50]) }}" alt="">
            <div class="media-body">
                <div>
                    {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                    {!! link_to_route("users.show", $favorite->user->name, ["user" => $favorite->user->id]) !!}
                    <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                </div>
                <div>
                    {{-- 投稿内容 --}}
                    <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                </div>
                {{-- お気に入り解除 --}}
                @if (Auth::id() != $favorite->id)
                    @if (Auth::user()->is_favorites($favorite->id))
                        {{-- お気に入り解除のフォーム --}}
                        {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
                        {!! Form::close() !!}
                    @endif
                @endif
                
        </li>
        
        @endforeach
    </ul>
@endif