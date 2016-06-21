<?php

namespace Users\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Expression;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;




class UserStatusesTable extends AbstractTableGateway implements AdapterAwareInterface
{
    const COMMENT_TYPE_ID = 1;

    protected $table = 'user_statuses'; // Extending AbstractTableGateway, we are required to assign this Gateway to a table
    const TABLE_NAME = 'user_statuses';


    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    /**
     * Method to insert a status to a user
     *
     * @param int $userId
     * @param string $status
     * @return boolean
     */
    public function getByUserId($userId)
    {
                        // since we want to order this by DESC, we will need to do a ->sql->select().
        $select = $this->sql->select()
                ->where(array('user_id' => $userId))
                ->order('created_at DESC');

        // To execute a statement with a given Select object, we use the method, selectWith(), which accepts the Select object as a parameter.
        return $this->selectWith($select);
    }
}