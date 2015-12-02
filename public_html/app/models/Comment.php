<?php

class Comment extends Eloquent
{
    protected $fillable = array('author', 'text', 'photo', 'published', 'social_link');
    protected $appends = array('social_type');

    const NOAVATAR_IMAGE = 'noavatar.png';
    const PATH_TO_AVATARS = '/img/avatars/';
    const NO_SOCIAL_LINK_TEXT = 'нет';

    const SOCIAL_TYPE_VK = 'vk';
    const SOCIAL_TYPE_TWITTER = 'twitter';
    const SOCIAL_TYPE_FACEBOOK = 'facebook';
    const SOCIAL_TYPE_SOUNDCLOUD = 'soundcloud';
    const SOCIAL_TYPE_ODNOKLASSNIKI = 'users';
    const SOCIAL_TYPE_DEFAULT = 'user';

    const SOCIAL_TYPE_GOOGLE_PLUS = 'google-plus';

    public function getCreatedAtAttribute($value)
    {
        return with(new DateTime($value))->format('d.m.Y H:i');
    }

    public function getSocialTypeAttribute()
    {
        $social_link = $this->social_link;
        switch ($social_link) {
            case str_contains($social_link, self::SOCIAL_TYPE_VK) :
                return self::SOCIAL_TYPE_VK;
            case str_contains($social_link, self::SOCIAL_TYPE_FACEBOOK) :
                return self::SOCIAL_TYPE_FACEBOOK;
            case str_contains($social_link, self::SOCIAL_TYPE_TWITTER) :
                return self::SOCIAL_TYPE_TWITTER;
            case str_contains($social_link, self::SOCIAL_TYPE_ODNOKLASSNIKI) :
                return self::SOCIAL_TYPE_ODNOKLASSNIKI;
            case str_contains($social_link, self::SOCIAL_TYPE_SOUNDCLOUD) :
                return self::SOCIAL_TYPE_SOUNDCLOUD;
            case str_contains($social_link, 'google') :
                return self::SOCIAL_TYPE_GOOGLE_PLUS;
            default:
                return self::SOCIAL_TYPE_DEFAULT;

        }
    }

    public function getPhotoAttribute($value)
    {
        if ($this->photoExists($value)) {
            return self::PATH_TO_AVATARS . $value;
        }
        return $this->defaultPhoto();
    }

    public function hasDefaultPhoto()
    {
        return $this->photo == $this->defaultPhoto();
    }

    public function defaultPhoto()
    {
        return self::PATH_TO_AVATARS . self::NOAVATAR_IMAGE;
    }

    public function fullPhotoPath()
    {
        return public_path($this->photo);
    }

    private function photoExists($filename)
    {
        $path = public_path(self::PATH_TO_AVATARS . $filename);
        return !empty($filename) && file_exists($path);
    }

}