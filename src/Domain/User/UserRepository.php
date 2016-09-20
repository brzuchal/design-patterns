<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:01
 */
namespace DocFlow\Domain\User;

/**
 * Interface UserRepository
 * @package DocFlow\Domain
 */
interface UserRepository
{
    public function load();

    /**
     * Stores user
     * @param User $user
     * @return mixed
     */
    public function save(User $user);
}
