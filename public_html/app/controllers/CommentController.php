<?php

class CommentController extends \BaseController
{
    private static function getSocialLink()
    {
        return Input::get('social_link') != Comment::NO_SOCIAL_LINK_TEXT ?
               Input::get('social_link') : null;
    }

    public function index()
    {
        $comments = Comment::orderBy('published', 'ASC')->orderBy('created_at', 'DESC')->get();
        return Response::json($comments);
    }

    public function show()
    {
        $comments = Comment::where('published', 1)->orderBy('created_at', 'DESC')->get();
        return Response::json($comments);
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return Response::json($comment);
    }

    public function update($id)
    {
        $comment = Comment::find($id);
        if (Input::has('published')) {
            $comment->published = Input::get('published');
        }
        if (Input::has('created_at')) {
            $comment->published = Input::get('published');
        }
        if (Input::has('author')) {
            $comment->author = Input::get('author');
        }
        if (Input::has('text')) {
            $comment->text = Input::get('text');
        }
        if (Input::has('photo')) {
            $comment->photo = basename(Input::get('photo'));
        }
        if (Input::has('social_link') || Input::get('social_link') == '') {
            $comment->social_link = self::getSocialLink();
        }

        $comment->save();

        return Response::json(array('success' => true));
    }

    public function store()
    {
        Comment::create(array(
            'author' => Input::get('author'),
            'text' => Input::get('text'),
            'photo' => Input::get('photo'),
            'social_link' => self::getSocialLink()
        ));

        return Response::json(array('success' => true));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment->hasDefaultPhoto()) {
            File::delete($comment->fullPhotoPath());
        }
        Comment::destroy($id);
        return Response::json(array('success' => true));
    }

}
