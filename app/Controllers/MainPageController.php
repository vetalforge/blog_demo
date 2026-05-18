<?php

namespace App\Controllers;

use App\Http\{Request, Session};
use App\Models\User;
use Smarty\Smarty;

class MainPageController extends Controller
{
    public function __construct(
        Request $request,
        Session $session,
        private Smarty $templateEngine,
        private User $user
    ) {
        parent::__construct($request, $session);
    }

    public function index()
    {
        $this->templateEngine->assign('siteName', 'Blog Sample');
        $this->templateEngine->assign('pageTitle', 'Home');
        $this->templateEngine->display('home.tpl');

        $users = $this->user->query()->get();
        print_r($users);
    }
}