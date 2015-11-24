<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;

use AppBundle\Entity\Exam;
use AppBundle\Entity\Grade;
use AppBundle\Entity\Student;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAllData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $admin = new Admin();
        $admin
            ->setEmail('romaric.drigon@gmail.com')
            ->setUsername('admin')
            ->setPlainPassword('admin')
            ->setEnabled(1)
            ->setRoles(['ROLE_SUPER_ADMIN'])
        ;

        $student = new Student();
        $student
            ->setEmail('John@Doe.fr')
            ->setFirstName('John')
            ->setLastName('Doe')
        ;

        $exam = new Exam();
        $exam
            ->setName('Symfony 2')
            ->setDescription('Best framework')
        ;

        $grade = new Grade();
        $grade
            ->setGradeNumber(15)
            ->setStudent($student)
            ->setExam($exam)
        ;

        // Je sauvegarde en DB
        $manager->persist($admin);
        $manager->persist($student);
        $manager->persist($exam);
        $manager->persist($grade);
        $manager->flush();
    }
}