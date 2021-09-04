<?php

if( ! file_exists( 'activeMainLink' ) )
{
    function activeMainLink()
    {
        if( request()->is( '/' ) )
            return 'active';
    }
}

if( ! file_exists( 'activeArticlesLink' ) )
{
    function activeArticlesLink()
    {
        if( request()->is( 'articles' ) or request()->is( 'articles/*' ) )
            return 'active';
    }
}
