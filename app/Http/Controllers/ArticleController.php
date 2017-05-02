<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $limit = 5;

    /**
     * ArticleController constructor.
     *
     * @param $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($title = $request->get('title')) {
            return $this->articleRepository->findArticles($title,$this->limit);
        } else {
            return $this->articleRepository->getArticles($this->limit);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->all();
        return $this->articleRepository->createArticle($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Article             $article
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        $data = $request->all();
        return $this->articleRepository->updateArticle($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->articleRepository->deleteArticle($id);
    }

    public function batch(Request $request)
    {
        $ids = $request->get('ids');
        return $this->articleRepository->deleteArticle($ids);
    }
}
