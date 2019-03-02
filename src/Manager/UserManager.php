<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager extends AbstractManager
{
    private $encodePassword;

    public function __construct(EntityManagerInterface $em, UserRepository $userRepository, UserPasswordEncoderInterface $encodePassword)
    {
        $this->setManager($em);
        $this->setRepository($userRepository);
        $this->encodePassword = $encodePassword;
    }

    public function createAdmin($email, $password)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->encodePassword->encodePassword($user, $password));
        $user->setRoles(['ROLE_ADMIN']);

        $this->update($user);

        return $user;
    }
}
