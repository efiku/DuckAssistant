<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 22.03.15
 * Time: 12:52
 */

namespace Duck\AssistantBundle\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Duck\AssistantBundle\Entity\User;

class UserData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setEmail('admin@localhost');
        $userAdmin->setPassword('admin');
        $userAdmin->setName('admin');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}