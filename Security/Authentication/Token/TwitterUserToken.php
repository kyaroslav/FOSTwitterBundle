<?php

/*
 * This file is part of the FOSTwitterBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\TwitterBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class TwitterUserToken extends AbstractToken
{
    private $oauthVerifier;

    public function __construct($uid = '', $oauthVerifier, array $roles = array())
    {
        parent::__construct($roles);

        $this->oauthVerifier = $oauthVerifier;
        $this->setUser($uid);

        if (!empty($roles)) {
            parent::setAuthenticated(true);
        }
    }

    public function setAuthenticated($bool)
    {
        if ($bool) {
            throw new  \LogicException('TwitterUserToken may not be set to authenticated after creation.');
        }

        parent::setAuthenticated(false);
    }

    public function getCredentials()
    {
        return '';
    }

    public function getOauthVerifier()
    {
        return $this->oauthVerifier;
    }

    public function serialize()
    {
        return serialize(array(
            $this->oauthVerifier,
            parent::serialize(),
        ));
    }

    public function unserialize($str)
    {
        list($this->oauthVerifier, $parentStr) = unserialize($str);
        parent::unserialize($parentStr);
    }
}
