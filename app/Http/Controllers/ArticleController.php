<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
        ->with('category')
        ->latest()
        ->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


    public function byCategory(Category $category)
    {
        $articles = Article::published()
        ->where('category_id', $category->id)
        ->with('category')
        ->latest()
        ->get();
        return view('articles.index', compact('articles'));
    }
}

?>












