<?php

class BlogController extends \BaseController
{
    public function index()
    {
        $articles = Article::orderBy('published', 'ASC')->orderBy('created_at', 'DESC')->get();
        return Response::json($articles);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return Response::json($article);
    }

    public function published()
    {
        $articles = Article::where('published', 1)->orderBy('created_at', 'DESC')->get();
        return Response::json($articles);
    }

    public function update($id)
    {
        $article = Article::find($id);
        if (Input::has('published')) {
            $article->published = Input::get('published');
        }
        if (Input::has('title')) {
            $article->title = Input::get('title');
        }
        if (Input::has('text')) {
            $article->text = Input::get('text');
        }
        if (Input::has('category')) {
            $article->category = Input::get('category');
        }
        if (Input::has('img')) {
            $article->img = Input::get('img');
        }
        $article->save();

        return Response::json(array('success' => true));
    }

    public function store()
    {
        Article::create(array(
            'title' => Input::get('title'),
            'text' => Input::get('text'),
            'category' => Input::get('category'),
            'img' => Input::get('img')
        ));

        return Response::json(array('success' => true));
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return Response::json(array('success' => true));
    }
} 