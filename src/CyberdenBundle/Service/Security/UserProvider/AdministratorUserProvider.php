<?php
// src/AppBundle/Security/User/WebserviceUserProvider.php
namespace CyberdenBundle\Service\Security\UserProvider;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use CyberdenBundle\Service\EntityRepository\AdministratorRepository;
use CyberdenBundle\Model\Administrator;

class AdministratorUserProvider implements UserProviderInterface
{
    private $administratorRepository;

    public function __construct(AdministratorRepository $administratorRepository)
    {
        $this->administratorRepository = $administratorRepository;
    }

    public function loadUserByUsername($username)
    {
        // make a call to your webservice here
        $administrator = $this->administratorRepository->createQuery()
            ->filterByUsername($username)
            ->findOne();
        
        if ($administrator) {
            return $administrator;
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Administrator) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'CyberdenBundle\Model\Administrator';
    }
}