<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Users\Entity;

// store the data passed from the API
class User
{
    const GENDER_MALE = 1;


    // protected properties, one for each column in the database
    protected $id;
    protected $username;
    protected $name;
    protected $surname;
    protected $avatar;
    protected $bio;
    protected $location;
    protected $gender;
    protected $createdAt = null;
    protected $updatedAt = null;
}