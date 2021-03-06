<?php
/**
 * Namespace for all Specifications of User.
 * @since 0.0.1-dev
 */
namespace Clanify\Domain\Specification\User;

use Clanify\Domain\Entity\IEntity;
use Clanify\Domain\Entity\User;
use Clanify\Domain\Specification\Specification;

/**
 * Class IsValidUsername
 *
 * @author Sebastian Brosch <contact@sebastianbrosch.de>
 * @copyright 2016 Clanify
 * @license GNU General Public License, version 3
 * @package Clanify\Domain\Specification\User
 * @version 0.0.1-dev
 */
class IsValidUsername extends Specification
{
    /**
     * Method to check if the User satisfies the Specification.
     * @param IEntity $user The User which will be checked.
     * @return bool The state if the User satisfies the Specification.
     * @since 0.0.1-dev
     */
    public function isSatisfiedBy(IEntity $user)
    {
        //check if a User is available.
        if ($user instanceof User) {
            return (preg_match('/^[a-zA-Z0-9]{5,100}$/', $user->username) === 1);
        } else {
            return false;
        }
    }
}
