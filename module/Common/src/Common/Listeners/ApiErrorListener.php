<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Common\Listeners;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;


// the listener that will help us spot issues on the API and will modulate the standard response for API-Problem in the future.
class ApiErrorListener extends AbstractListenerAggregate
{
    // Now we should track the events we are listening to in order to accomplish our need to add a property to the class to store them.
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, __CLASS__.'::onRender', 1000);
    }

    public static function onRender(MvcEvent $e)
    {
        /*
         * check if the response is marked as 200 OK. If it is, we don't have to continue worrying about errors;
         */
        if ($e->getResponse()->isOk()) {
            return;
        }
        /*
         * we retrieve the status code and the exception variable from ViewModel
         */
        $httpCode = $e->getResponse()->getStatusCode();
        $sm = $e->getApplication()->getServiceManager();
        $viewModel = $e->getResult();
        $exception = $viewModel->getVariable('exception');


        /*
         * With the data we extracted, we create a new JsonModel object...
         */
        $model = new JsonModel(array(
            'errorCode' =>  !empty($exception) ? $exception->getCode() : $httpCode, // specifying errorCode based on the code used in the exception otherwise, we use the HTTP error and we also specify errorMsg based on the text of the exception.
            'errorMsg'  => !empty($exception) ? $exception->getMessage() : NULL,
        ));

        // setTerminal() method of the JsonModel object to set the terminal flag to true to tell ZF2 to not wrap the returned model in a layout
        $model->setTerminal(true);

        // attach the new JsonModel object to the response overwriting the previous one and...
        $e->setResult($model);
        $e->setViewModel($model);
        // setting the corresponding status code
        $e->getResponse()->setStatusCode($httpCode);
    }
}