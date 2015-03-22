<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 22.03.15
 * Time: 01:56
 */

namespace Duck\AssistantBundle\Interfaces;


use Duck\AssistantBundle\Entity\User;

interface EntityAuthorInterface {
    public function setCreatedBy(User $createdBy);

}