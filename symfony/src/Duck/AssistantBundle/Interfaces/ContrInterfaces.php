<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 22.03.15
 * Time: 01:11
 */

namespace Duck\AssistantBundle\Interfaces;


interface ContrInterfaces {

    // New Cat / itm itd
    public function createNewItem();

    // New formType
    public function createFormType();

    // Public function
    public function getDoctrimeManager();
}