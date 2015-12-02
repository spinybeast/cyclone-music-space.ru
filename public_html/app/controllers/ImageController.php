<?php

class ImageController extends \BaseController
{
    const STATUS_SUCCESS = 'OK';
    const STATUS_ERROR = 'FAIL';

    public function uploadAvatar()
    {
        return $this->upload(public_path(Comment::PATH_TO_AVATARS));
    }

    public function uploadArticleImg()
    {
        return $this->upload(public_path(Article::PATH_TO_IMG));
    }

    private function upload($path)
    {
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($path, $filename);

            if ($uploadSuccess) {
                return Response::json(
                    array(
                        'status' => self::STATUS_SUCCESS,
                        'filename' => $filename
                    )
                );
            }
        }
        return Response::json(array(
            'status' => self::STATUS_ERROR
        ));
    }
} 