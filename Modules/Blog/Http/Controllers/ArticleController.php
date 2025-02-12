<?php

namespace Modules\Blog\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Article;
use Illuminate\Support\Facades\Log;
use Modules\Blog\Dto\ArticleStoreDto;
use Modules\Blog\Dto\ArticleUpdateDto;
use Modules\Blog\Services\ArticleService;
use Modules\Blog\Transformers\ArticleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Blog\Http\Requests\ArticleStoreRequest;
use Modules\Blog\Http\Requests\ArticleUpdateRequest;

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
     * @param  ArticleStoreRequest $request
     * @return JsonResource
     */
    public function store(ArticleStoreRequest $request)
    {
        try {
            $article = $this->articleService->create(
                new ArticleStoreDto(...$request->validated())
            );
        } catch (Exception $e) {
            Log::error('[ArticleController@store]: ' . $e->getMessage());

            return response()->json([
                'message' => 'ARTICLE_STORE_ERROR',
            ], 500);
        }

        return new ArticleResource($article);
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
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        try {
            $this->articleService->update(
                new ArticleUpdateDto(...$request->validated()),
                $article
            );
        } catch (Exception $e) {
            Log::error('[ArticleController@update]: ' . $e->getMessage());

            return response()->json([
                'message' => 'ARTICLE_UPDATE_ERROR'
            ], 500);
        }

        return new ArticleResource($article);
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
