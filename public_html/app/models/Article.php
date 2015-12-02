<?php

class Article extends Eloquent
{
    protected $fillable = array('title', 'text', 'category', 'published', 'img');
    protected $appends = array('preview', 'full_preview', 'category_text');

    const MUSIC = 1;
    const TRAVEL = 2;
    const PATH_TO_IMG = '/img/articles/';

    public static $categories = array(
        self::MUSIC => 'Музыка',
        self::TRAVEL => 'Путешествия'
    );

    public function getCreatedAtAttribute($value)
    {
        return with(new DateTime($value))->format('d.m.Y H:i');
    }

    public function getPreviewAttribute()
    {
        return str_limit(strip_tags($this->text), 200);
    }

    public function getFullPreviewAttribute()
    {
        return str_limit(strip_tags($this->text), 450);
    }

    public function getCategoryTextAttribute()
    {
        return self::$categories[$this->category];
    }

    public function getTextAttribute($value)
    {
        return stripslashes($value);
    }
} 