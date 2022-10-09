<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Repositories\ArticleRepository as ArticleRepository;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    //
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    public function index()
    {
        try {
            $articles = $this->articleRepository->index();
            return view('articles.index', compact('articles'));
        } catch (Exception $e) {
            return redirect('/dashboard')->with('message', 'something happen please try again ');
        }
    }


    public function create_article()
    {
        try {
            $data = $this->articleRepository->create_article();
            return view('articles.create', compact('data'));
        } catch (Exception $e) {
            return redirect('/articles')->with('message', 'something happen please try again ');
        }
    }

    public function store_article(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required|min:5',
            'category_id' => 'required|int',
            'status' => 'required',
        ]);
        $data_request = $request->all();
        try {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $article = $this->articleRepository->store_article($data_request);
                if ($article)
                    return redirect('/articles')->with(['message' => ' Article Added Successfully']);
            }
        } catch (Exception $e) {
            return redirect('/articles');
        }

    }


    public function show_article(Request $request)
    {

        try {
            $data = $this->articleRepository->show_article($request->id);
            $article= $data['article'];
            $comments= $data['comments'];
            return view('articles.show', compact('article','comments'));
        } catch (Exception $e) {
            return redirect('/articles')->with('message', 'something happen please try again ');
        }
    }

    public function add_comment_to_article(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'comment' => 'required|min:2',
            'article_id' => 'required|int',
        ]);
        $data_request = $request->all();
        try {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $article = $this->articleRepository->add_comment($data_request);
                if ($article)
                    return redirect()->back()->with(['message' => ' Article Added Successfully']);
            }
        } catch (Exception $e) {
            return redirect()->back();
        }

    }


}
