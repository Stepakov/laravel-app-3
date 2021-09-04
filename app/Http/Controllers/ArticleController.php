<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::allPaginate( 5 );

        return view( 'app.article.index', compact( 'articles' ) );
    }

    public function show( $slug )
    {
        $article = Article::findBySlug( $slug );

        return view( 'app.article.show', compact( 'article' ) );
    }

    public function sortByTag( Tag $tag )
    {
        $articles = $tag->articles()->allPaginate( 3 );

        return view( 'app.article.tag', compact( 'articles' ) );
    }
}
