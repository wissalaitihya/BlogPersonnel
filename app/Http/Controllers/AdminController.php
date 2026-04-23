<?php
namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->latest()
            ->get();
        return view('admin.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'required|max:300',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($validatedData['status'] === 'published') {
            $validatedData['published_at'] = now();
        }
        Article::create($validatedData);

        return redirect()->route('admin.index')
            ->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'required|max:300',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        if ($validatedData['status'] === 'published') {
            $validatedData['published_at'] = now();
        }
        $article->update($validatedData);

        return redirect()->route('admin.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.index')
            ->with('success', 'Article deleted successfully.');
    }
}