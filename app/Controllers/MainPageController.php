<?php

namespace app\Controllers;

use app\Http\{Request, Session};
use app\Models\User;
use Smarty\Smarty;

class MainPageController extends Controller
{
    public function __construct(
        private Request $request,
        private Session $session,
        private User $user,
        private Smarty $templateEngine
    ) {
        parent::__construct($request, $session);
    }

    public function index()
    {
        $this->templateEngine->assign('siteName', 'Blog Sample');
        $this->templateEngine->assign('pageTitle', 'Home');

        $this->templateEngine->display('home.tpl');
    }
}