<?php

namespace Users\Model;

use Zend\Db\Adapter\Adapter;

use Zend\Db\TableGateway\AbstractTableGateway; //
use Zend\Db\Adapter\AdapterAwareInterface; // This interface allows the dependency injector to set the adapter we have to use for the connections to the database.

class UsersTable extends AbstractTableGateway implements
AdapterAwareInterface
{
    protected $table = 'users'; //  As we are extending AbtractTableGateway, we have to define the name of the table we are representing; that's the job we do when we declare the protected variable, $table.

    /**
     * This is just the implementation of the method stated in the
     * interface.
     *
     * In this case we store the adapter on the local variable, and then we call the initialize() method to set
     * up the wiring on the object.
     *
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    /**
     * We define a custom method that we will use to get info from the table.
     *
     * Retrieve users by their username.
     *
     * As we are fetching the info of one user, instead of returning Rowset we call the current() method to return
     * the first result.
     *
     * @param type $username
     * @return type
     */
    public function getByUsername($username)
    {
        $rowset = $this->select(array('username' => $username));
        return $rowset->current(); // In theory we are going to have only one user with a specific username because we defined a unique index on the username column.
    }
}

