<?php

namespace Modules\Blog\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Services\ArticleService;
use Modules\Blog\Transformers\ArticleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Modules\Blog\Entities\Article;

class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        try {
            $articles = $this->articleService->getAll();
        } catch (Exception $e) {
            Log::error('[ArticleController@index]: ' . $e->getMessage());

            return response()->json([
                'message' => 'ARTICLE_INDEX_ERROR',
            ], 500);
        }

        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResource
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return JsonResource
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResource
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return JsonResource
     */
    public function destroy(Article $article)
    {
        try {
            $this->articleService->delete($article);
        } catch (Exception $e) {
            Log::error('[ArticleController@destroy]: ' . $e->getMessage());

            return response()->json([
                'message' => 'ARTICLE_DESTROY_ERROR'
            ], 500);
        }

        return response()->json(null, 204);
    }
}
