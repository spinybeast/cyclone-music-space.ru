<?php

class PortfolioController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return with(new SoundCloud)->getTracks();
    }

} 