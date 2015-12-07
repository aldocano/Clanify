<?php
/**
 * Namespace to test the DataMappers of Clanify.
 * @since 0.0.1-dev
 */
namespace Clanify\Test\Domain\DataMapper;

use Clanify\Domain\Entity\Permission;
use Clanify\Domain\DataMapper\PermissionMapper;

/**
 * Class PermissionMapperTest
 *
 * @author Sebastian Brosch <contact@sebastianbrosch.de>
 * @copyright 2015 Clanify
 * @license GNU General Public License, version 3
 * @package Clanify\Test\Domain\DataMapper
 * @version 0.0.1-dev
 */
class PermissionMapperTest extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * The database connection with PDO.
     * @since 0.0.1-dev
     * @var null|\PDO
     */
    private $pdo = null;

    /**
     * Method to get the database connection for test.
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     * @since 0.0.1-dev
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function getConnection()
    {
        $this->pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
        return $this->createDefaultDBConnection($this->pdo, $GLOBALS['DB_DBNAME']);
    }

    /**
     * Method to get the initial state of the database for test.
     * @return \PHPUnit_Extensions_Database_DataSet_XmlDataSet
     * @since 0.0.1-dev
     */
    public function getDataset()
    {
        return $this->createXMLDataSet(__DIR__.'/DataSets/Permission/permission.xml');
    }

    /**
     * Method to test if the method delete() works.
     * @since 0.0.1-dev
     * @test
     */
    public function testDelete()
    {
        //The Permission which will be deleted on database.
        $permission = new Permission();
        $permission->id = 2;

        //The PermissionMapper to delete the Permission on database.
        $permissionMapper = new PermissionMapper($this->pdo);
        $permissionMapper->delete($permission);

        //Get the actual and expected table.
        $queryTable = $this->getConnection()->createQueryTable('permission', 'SELECT * FROM permission');
        $expectedDataSet = __DIR__.'/DataSets/Permission/permission-delete.xml';
        $expectedTable = $this->createXMLDataSet($expectedDataSet)->getTable('permission');

        //Check if the tables are equal.
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    /**
     * Method to test if the method create() works.
     * @since 0.0.1-dev
     * @test
     */
    public function testSaveCreate()
    {
        //The Permission which will be created on database.
        $permission = new Permission();
        $permission->name = 'user_invite';

        //The PermissionMapper to create the Permission on database.
        $permissionMapper = new PermissionMapper($this->pdo);
        $permissionMapper->save($permission);

        //Get the actual and expected table.
        $queryTable = $this->getConnection()->createQueryTable('permission', 'SELECT * FROM permission');
        $expectedDataSet = __DIR__.'/DataSets/Permission/permission-save-create.xml';
        $expectedTable = $this->createXMLDataSet($expectedDataSet)->getTable('permission');

        //Check if the tables are equal.
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    /**
     * Method to test if the method update() works.
     * @since 0.0.1-dev
     * @test
     */
    public function testSaveUpdate()
    {
        //The Permission which will be updated on database.
        $permission = new Permission();
        $permission->id = 2;
        $permission->name = 'user_export';

        //The PermissionMapper to update the Permission on database.
        $permissionMapper = new PermissionMapper($this->pdo);
        $permissionMapper->save($permission);

        //Get the actual and expected table.
        $queryTable = $this->getConnection()->createQueryTable('permission', 'SELECT * FROM permission');
        $expectedDataSet = __DIR__.'/DataSets/Permission/permission-save-update.xml';
        $expectedTable = $this->createXMLDataSet($expectedDataSet)->getTable('permission');

        //Check if the tables are equal.
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}