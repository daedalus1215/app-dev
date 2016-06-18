<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Wall\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\ClassMethods;
use Users\Entity\User;
use Api\Client\ApiClient as ApiClient;


class IndexController extends AbstractActionController
{

    //in charge of the wall requests.
    public function indexAction()
    {
        $viewData = array();
        $username = $this->params()->fromRoute('username');
        $this->layout()->username = $username;
        $response = ApiClient::getWall($username);

        if ($response !== false) {
            $hydrator = new ClassMethods();
            $user = $hydrator->hydrate($response, new User());
        } else {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $viewData['profileData'] = $user;
        return $viewData;
    }
}