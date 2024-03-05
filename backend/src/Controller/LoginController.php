<?php

// src/Controller/LoginController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        if ($username === 'admin' && $password === 'password') {
            return new Response("OK", Response::HTTP_OK);
        } else {
            $message = 'mauvais username ou password';
            return new Response($message, Response::HTTP_UNAUTHORIZED);
        }
    }
}
