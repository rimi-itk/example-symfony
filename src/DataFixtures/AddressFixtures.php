<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture
{
    #[\Override]
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $address = new Address();
            $address->setAddress(sprintf('Address %d', $i));
            $manager->persist($address);
            $this->addReference('address_'.$i, $address);
        }

        $manager->flush();
    }
}
