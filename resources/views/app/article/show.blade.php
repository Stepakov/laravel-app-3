@extends( 'layouts.layout' )



@section( 'content' )
    <div class="row">
        <h1>{{ $article->title }}</h1>
        <img src="{{ $article->img }}" alt="">
        <hr>
       <div>
           @foreach( $article->tags as $tag )
               @if( $loop->last )
                   <span>{{ $tag->label }}</span>
               @else
                   <span>{{ $tag->label }}</span> |
               @endif
           @endforeach
       </div>
        <hr>
        <p>
            {{ $article->body }}
        </p>

        <hr>

        <h3>Comments</h3>
        @foreach( $article->comments as $comment )
            <div class="card mb-3">
                <img src="https://via.placeholder.com/100/555/fff/?text=User" alt="" style="width: 100px; height: 100px;">
                <span>{{ $comment->subject }}</span>
                <p>
                    {{ $comment->body }}
                </p>
                <hr>
                {{ $comment->created_at }}
            </div>
        @endforeach
    </div>
@endsection
