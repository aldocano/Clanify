<?php
/**
 * Namespace for all Entities of Clanify.
 * @since 0.0.1-dev
 */
namespace Clanify\Domain\Entity;

/**
 * Interface IEntity
 *
 * @author Sebastian Brosch <contact@sebastianbrosch.de>
 * @copyright 2016 Clanify
 * @license GNU General Public License, version 3
 * @package Clanify\Domain\Entity
 * @version 0.0.1-dev
 */
interface IEntity
{
    /**
     * Method to load an array to the Entity.
     * @param array $array The array which will be loaded to the Entity.
     * @param string $prefix The prefix of the keys of the array.
     * @since 0.0.1-dev
     */
    public function loadFromArray($array, $prefix = '');

    /**
     * Method to load the GET array to the Entity.
     * @param string $prefix The prefix of the properties of the GET array.
     * @since 0.0.1-dev
     */
    public function loadFromGET($prefix = '');

    /**
     * Method to load an object to the Entity.
     * @param object $object The object which will be loaded to the Entity.
     * @param string $prefix The prefix of the properties of the object.
     * @since 0.0.1-dev
     */
    public function loadFromObject($object, $prefix = '');

    /**
     * Method to load the POST array to the Entity.
     * @param string $prefix The prefix of the properties of the POST array.
     * @since 0.0.1-dev
     */
    public function loadFromPOST($prefix = '');
}
