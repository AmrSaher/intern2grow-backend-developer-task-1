<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());

        return response()->json([
            'message' => 'Article created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($article) return response()->json($article);

        return response()->json([
            'message' => 'Article not found.',
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if (!$article) return response()->json([
            'message' => 'Article not found.'
        ], 404);

        $article->update($request->all());

        return response()->json([
            'message' => 'Article created successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (!$article) return response()->json([
            'message' => 'Article not found.',
        ], 404);

        $article->delete();

        return response()->json([
            'message' => 'Article deleted successfully!',
        ]);
    }
}
