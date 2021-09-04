@extends( 'layouts.layout' )


@section( 'hero' )
    @include( 'app.partials.hero' )
@endsection

@section( 'content' )
    <div class="row">
        @foreach( $articles as $article )
            <div class="col-6 mb-3">
            <div class="card">
                <img src="{{ $article->img }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->getPartOfBody() }}</p>
                    <a href="{{ route( 'article.show', $article->slug ) }}" class="btn btn-primary">More</a>
                    <hr>
                    <span class="badge bg-info text-dark"><i class="fas fa-eye"></i> {{ $article->state->views }}</span>
                    <span class="badge bg-info text-dark"><i class="far fa-thumbs-up"></i> {{ $article->state->likes }}</span>
                    <span class="float-end">
                        @foreach( $article->tags as $tag )
                            <span class="badge bg-success">
                                <a href="{{ route( 'article.tag', $tag->id ) }}" style="color: white;">{{ $tag->label }}</a>
                            </span>
                        @endforeach
                    </span>
                    <hr>

                    <div>
                        <span>Created: {{ $article->createdAtForHumans() }}</span>
                        <span class="float-end">Published: {{ $article->published_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection
