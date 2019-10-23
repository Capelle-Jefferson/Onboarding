<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\DepartmentCompany;

class DepartmentCompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $list_departement = ["direction", "dev", "rh", "com"];
        foreach ($list_departement as $value) {
            $department = new DepartmentCompany();
            $department->setName($value)
                       ->setMail($value . "_exercice@gmail.com");
            $manager->persist($department);
        }
        $manager->flush();
    }
}
