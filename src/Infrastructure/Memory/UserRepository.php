<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 10:38
 */
namespace DocFlow\Infrastructure\Memory;

use DocFlow\Domain\User\User;
use Madkom\Collection\CustomTypedCollection;

/**
 * Class UserRepository
 * @package DocFlow\Infrastructure\Memory
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class UserRepository implements \DocFlow\Domain\User\UserRepository
{
    /** @var CustomTypedCollection */
    private $users;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->users = new class extends CustomTypedCollection {
            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return User::class;
            }
        };
    }

    /**
     * Stores user
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        $this->users->add($user);
    }

    /**
     * Retrieves user by id
     * @param string $userId
     * @return User
     */
    public function findById(string $userId) : User
    {
        /** @var User $user */
        foreach ($this->users as $user) {
            if ($user->getName() == $userId) {
                return $user;
            }
        }

        throw new \InvalidArgumentException("Missing user: {$userId}");
    }
}
