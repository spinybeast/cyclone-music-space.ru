<?php

class HomeController extends BaseController
{

    public function showLogin()
    {
        return View::make('admin.login');
    }

    public function doLogin()
    {
        $rules = array(
            'login' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'login' => Input::get('login'),
                'password' => Input::get('password')
            );
            if (Auth::attempt($userdata)) {
                return Redirect::to('admin');
            } else {
                return Redirect::to('login')->withErrors(array('badAuth' => 'Неверный логин или пароль'));
            }

        }
    }
}
