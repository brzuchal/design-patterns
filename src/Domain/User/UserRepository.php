<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:01
 */
namespace DocFlow\Domain;

/**
 * Interface UserRepository
 * @package DocFlow\Domain
 */
interface UserRepository
{
    public function load();

    public function save(User $user);
}
