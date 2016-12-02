<?php

namespace CyberdenBundle\Model;

use CyberdenBundle\Model\Base\Administrator as BaseAdministrator;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;


/**
 * Skeleton subclass for representing a row from the 'administrator' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Administrator extends BaseAdministrator implements UserInterface, EquatableInterface
{
    protected $roles = array(
        'ROLE_ADMIN'
    );

    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt()
    {
        return '';
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof Administrator) {
            return false;
        }

        if ($this->id !== $user->getId()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        return true;
    }

}
