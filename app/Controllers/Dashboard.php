<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $usersModel = new \App\Models\UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
        ];
        return view('dashboard/index', $data);
    }
    function profile() {
        $usersModel = new \App\Models\UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Profile',
            'userInfo'=>$userInfo
        ];
        return view('dashboard/profile', $data);
    }

    function test() {
        $usersModel = new \App\Models\UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Test',
            'userInfo'=>$userInfo
        ];
        return view('dashboard/test', $data);
    }
}
