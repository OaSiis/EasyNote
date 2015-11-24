<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAdminData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $admin = new Admin();

        $admin
        ->setEmail('maxcharbonelle@gmail.com')
        ->setUsername('admin')
        ->setPlainPassword('admin')
        ->setEnabled(1)
        ->setRoles(['ROLE_SUPER_ADMIN'])
        ;

        // Je sauvegarde en DB
        $manager->persist($admin);
        $manager->flush();
    }
}