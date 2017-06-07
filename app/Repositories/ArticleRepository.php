<?php

namespace App\Repositories;


use App\Article;

/**
 * Class ArticleRepository
 *
 * @package App\Repositories
 */
class ArticleRepository
{
    /**
     * 获取列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getArticles($limit)
    {
        return Article::paginate($limit);
    }

    /**
     * 分页
     *
     * @param $page
     * @param $limit
     *
     * @return mixed
     */
    public function getArticlePages($page, $limit)
    {
        $skip = ($page - 1) * $limit;
        return Article::orderBy('id', 'desc')->skip($skip)->take($limit)->get();
    }

    /**
     * 查询
     *
     * @param $title
     *
     * @return mixed
     */
    public function findArticles($title,$limit)
    {
        return Article::where('title', 'like', $title . '%')->paginate($limit);
    }

    /**
     * 新增
     *
     * @param $data
     *
     * @return mixed
     */
    public function createArticle($data)
    {
        return Article::create($data);
    }

    /**
     * 更新
     *
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateArticle($id, $data)
    {
        return Article::where('id', '=', $id)->update($data);
    }

    /**
     * 删除
     *
     * @param $id
     *
     * @return int
     */
    public function deleteArticle($id)
    {
        return Article::destroy($id);
    }
}
