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
    private $data;

    /**
     * Loads data
     */
    public function load()
    {
        $this->data = new class extends CustomTypedCollection {
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
        $this->data->add($user);
    }
}
