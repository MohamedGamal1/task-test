<?php


namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class ArticleRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */


    public function index()
    {
        return $this->model->where('status','published')->get();
    }

    public function create_article()
    {
        $data = [];
        $data['categories'] = Category::all();
        return $data;

    }


    public function store_article($data)
    {

        return $this->model->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'category_id' => $data['category_id'],
        ]);

    }
    public function show_article($article_id)
    {
        $data = [];
        $data['article'] = $this->model->where(['id'=> $article_id,'status' => 'published'])->with('category')->first();

        $data['comments'] = Comment::where('article_id',$article_id)->get();

        return $data;

    }


    public function add_comment($data)
    {

        return Comment::create([
            'name' => $data['name'],
            'comment' => $data['comment'],
            'article_id' => $data['article_id'],
        ]);

    }

    function model(): string
    {
        return "App\Models\Article";
    }


}
