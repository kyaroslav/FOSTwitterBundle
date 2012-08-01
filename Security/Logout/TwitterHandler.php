<?php

/*
 * This file is part of the FOSTwitterBundle package.
 *
 */

namespace FOS\TwitterBundle\Security\Logout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

/**
 * Listener for the logout action
 *
 * This handler will clear the application's Twitter cookie.
 */
class TwitterHandler implements LogoutHandlerInterface
{
    private $twitter;

    public function __construct($twitter)
    {
        $this->twitter = $twitter;
    }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        //$response->headers->clearCookie('fbsr_'.$this->facebook->getAppId());
    }
}
