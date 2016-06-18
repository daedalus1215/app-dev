<?php

/*
    We have arrived at the last file of the
    API, the controller. Here, we put everything
    together and we fulfill the request with the data the clients need.
 */

/*
 * The controllers on the API side are based on AbstractRestfulController. That means the action we will execute to
 * fulfill the request is determined based on the type of requests.
 */


/*
 * In this controller, we have to accomplish two things:
 * 1. To implement the abstract methods of the parent class,
 * 2. To have access to the UsersTable object.
 */

namespace Wall\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulController
{

    /**
     * Holds the UsersTable object.
     * @var Users\Model\UsersTable
     */
    protected $userTable;

    /**
     * Get the UsersTable object from ServiceManager and store it in @$userTable
     * @return Users\Model\UsersTable
     */
    protected function getUsersTable()
    {
        if (!$this->usersTable) {
            $sm = $this->getServiceLocator();
            $this->usersTable = $sm->get(Users\Model\UsersTable);
        }
        return $this->usersTable;
    }


    /* Implement the methods of the parent class. */


    // ALLOWED
    public function get($username)
    {
      $usersTable = $this->getUsersTable(); //  retrieve the UsersTable object
      $userData = $usersTable->getByUsername($username);

      if ($userData !== false) {
          return new JsonModel($userData->getArrayCopy());
      } else {
          throw new \Exception('User not found', 404);
      }
    }


    // NOW ALLOWED
     public function getList()
    {
        $this->methodNotAllowed();
    }
    public function create($data)
    {
        $this->methodNotAllowed();
    }
    public function update($id, $data)
    {
        $this->methodNotAllowed();
    }
    public function delete($id)
    {
        $this->methodNotAllowed();
    }

    public function methodNotAllowed()
    {
        $this->response->setStatusCode(\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405);
    }
}