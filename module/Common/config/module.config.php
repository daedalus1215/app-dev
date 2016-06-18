<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// adding a new object as invokable to the service_manager array. So we will be able to retrieve it later.
return array(
    'service_manager' => array(
        'invokables' => array(
            'Common\Listeners\ApiProblemListener' =>
            'Common\Listeners\ApiProblemListener',
        ),
    ),
);