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


    public function getByUserId($userId)
    {
                        // since we want to order this by DESC, we will need to do a ->sql->select().
        $select = $this->sql->select()
                ->where(array('user_id' => $userId))
                ->order('created_at DESC');

        // To execute a statement with a given Select object, we use the method, selectWith(), which accepts the Select object as a parameter.
        return $this->selectWith($select);
    }

    public function create($userId, $status)
    {
        return $this->insert(array(
            'user_id' => $userId,
            'status' => $status,
            'created_at' => new Expression('NOW()'),
            'updated_at' => null
        ));
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();


        filter_validate_user_id($inputFilter);
        filter_validate_status($inputFilter);

        return $inputFilter;
    }

    public function filter_validate_user_id(&$inputFilter, &$factory)
    {
        $inputFilter->add($factory->createInput(array(
            'name'     => 'user_id',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Int'),
            ),
            'validators' => array(
                array('name' => 'NotEmpty'),
                array('name' => 'Digits'),
                array(
                    'name' => 'Zend\Validator\Db\RecordExists',
                    'options' => array(
                        'table' => 'users',
                        'field' => 'id',
                        'adapter' => $this->adapter
                    )
                )
            ),
        )));
    }

    public function filter_validate_status(&$inputFilter, &$factory)
    {
        $inputFilter->add($factory->createInput(array(
            'name' => 'status',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name'  => 'NotEmpty'),
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding'  => 'UTF-8',
                        'min'       => 1,
                        'max'       => 65535,
                    ),
                ),
            ),
        )));
    }
}