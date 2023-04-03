<?php
namespace controllers;
session_start();

use models\User;
use views\View;

class UserController
{
    public function profile():void

    {
        View::make('/profile', []);
    }

    public function createUser():void
    {
        if(isset($_POST['signup']) && $_POST['signup']== 'Create Account') {
            $message = (new User())->createNewUser(
                user_id: null,
                first_name: $_POST['firstname'],
                last_name: $_POST['lastname'],
                gender: $_POST['gender'],
                birth_date: $_POST['birthdate'],
                email: $_POST['email'],
                passwd: $_POST['password'],
                user_type: $_POST['type'],
                user_status: 'active'
            );

            if($message) {
                header("Location: /profile?user_id=$message");
            } else {
                header("Location: /register?message=$message");
            }
        }
    }

    public function userRetrieve(): void
    {
        if(isset($_POST['submit']) && $_POST['submit']== 'Sign In') {

            $user = (new User())->getUser($_POST['email'], $_POST['pass']);

            $_SESSION['user'] = $user;

            header("Location: /profile?user_id=$user[user_id]");

        }
    }
}