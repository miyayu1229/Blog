<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

/**
 * ブックマーク
 */
class BookmarkController extends Controller
{
    public function store(int $articleId): RedirectResponse

    {
        $user = Auth::user();
        if(! $user->isBookmark($articleId)){
            $user->bookmarkArticles()->attach($articleId);
        }

        return back();
    }


    public function destroy(int $articleId): RedirectResponse
    {        
        $user = Auth::user();
        if($user->isBookmark($articleId)) {
            $user->bookmarkArticles()->detach($articleId);
        }

        return back();
    }
}
