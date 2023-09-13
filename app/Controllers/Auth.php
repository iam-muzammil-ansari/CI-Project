<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends Controller
{
    public function __construct() {
        helper(['url','form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register() {
        return view('auth/register');
    }
    public function save() {
        //Let's validation required
        // $validation = $this->validate([
        //     'name'=>'required',
        //     'email'=>'required|valid_email|is_unique[users.email]',
        //     'password'=>'required|min_length[6]|max_length[12]',
        //     'cpassword'=>'required|min_length[6]|max_length[12]|matches[password]'
        // ]);

        $validation = $this->validate([
            'name'=>[
                'rules' => 'required',
                'errors'=>[
                    'required'=> 'Your full name is required'
                ]
            ],
            'email'=>[
                'rules'=> 'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=> 'You must enter a valid email',
                    'is_unique'=> 'Email already registered'
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[6]|max_length[12]',
                'errors'=>[
                    'required'=>'Password is required',
                    'min_length'=>'Password must have atleast 6 characters in length',
                    'max_length'=>'Password must not have characters more than 12 in length'
                ]
            ],
            'cpassword'=>[
                'rules'=>'required|min_length[6]|max_length[12]|matches[password]',
                'errors'=>[
                    'required'=>'Confirm Password is required',
                    'min_length'=>'Confirm Password must have atleast 6 characters in length',
                    'max_length'=>'Confirm Password must not have characters more than 12 in length',
                    'matches'=> 'Confirm Password not matches to Password'
                ]
            ]

        ]);
        if(!$validation) {
            return view('auth/register',['validation'=>$this->validator]);
        }else {
            //echo 'Form validation successfully';

            //Let's Register use into db
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' =>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
            ];
            $usersModel = new \App\Models\UserModel();
            $query = $usersModel->insert($values);
            if(!$query) {
                return redirect()->back()->with('fail','Something went wrong');
                //return redirect()->to('register')->with('fail','Something went wrong');
            }else {
                //return redirect()->back()->with('success','You are now registered successfully');
                $last_id = $usersModel->insertID();//This is last inserted id
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard');
            }
        }
    }
    function check() {
        //echo 'Check login process.......';

        //Let's start Validation

        $validation = $this->validate([
            'email'=>[
                'rules'=> 'required|valid_email|is_not_unique[users.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=> 'Enter a valid email',
                    'is_not_unique'=> 'This email is not registered'
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[6]|max_length[12]',
                'errors'=>[
                    'required'=>'Password is required',
                    'min_length'=>'Password must have atleast 6 characters in length',
                    'max_length'=>'Password must not have characters more than 12 in length'
                ]
            ],
        ]);
        if(!$validation) {
            return  view('auth/login',['validation'=>$this->validator]);
        }else {
            // echo 'Sign in Successfull';
            //Let's check User

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UserModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password,$user_info['password']);

            if(!$check_password) {
                session()->setFlashdata('fail','Incorrect password');
                return redirect()->to('/auth')->withInput();
            }else {
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard');
            }
        }
    }
    function logout() {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','You are Logged out!');
        }
    }
}