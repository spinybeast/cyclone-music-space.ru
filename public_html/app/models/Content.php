<?php

class Content extends Eloquent
{
    protected $fillable = array('route', 'title', 'en_title', 'html', 'en_html', 'enable');
}