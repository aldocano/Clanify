<?php
/**
 * Namespace for all Specifications of User.
 * @since 0.0.1-dev
 */
namespace Clanify\Domain\Specification\User;

use Clanify\Core\Database;
use Clanify\Domain\Entity\IEntity;
use Clanify\Domain\Entity\User;
use Clanify\Domain\Repository\UserRepository;
use Clanify\Domain\Specification\Specification;

/**
 * Class NotExistsUsername
 *
 * @author Sebastian Brosch <contact@sebastianbrosch.de>
 * @copyright 2015 Clanify
 * @license GNU General Public License, version 3
 * @package Clanify\Domain\Specification\User
 * @version 0.0.1-dev
 */
class NotExistsUsername extends Specification
{
    /**
     * Method to check if the User satisfies the Specification.
     * @param IEntity $user The User which will be checked.
     * @return bool The state if the User satisfies the Specification.
     * @since 0.0.1-dev
     */
    public function isSatisfiedBy(IEntity $user)
    {
        //check if the Entity is a User.
        if ($user instanceof User) {
            $database = Database::getInstance();
            $userRepository = new UserRepository($database->getConnection());

            //find the Users by username.
            $users = $userRepository->findByUsername($user->username);

            //check if the id should be excluded.
            if ($this->excludeID) {
                return $this->excludeCurrentID($users, $user);
            } else {
                return (count($users) > 0) ? false : true;
            }
        } else {
            return false;
        }
    }
}