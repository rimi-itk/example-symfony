<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PersonFixtures extends Fixture implements DependentFixtureInterface
{
    #[\Override]
    public function load(ObjectManager $manager): void
    {
        $person = new Person();
        $person
            ->setName('Person 1')
            ->setPrimaryAddress($this->getAddress('address_1'))
            ->addAddress($this->getAddress('address_3'));
        $manager->persist($person);

        $person = new Person();
        $person
          ->setName('Person 2')
          ->addAddress($this->getAddress('address_2'))
          ->addAddress($this->getAddress('address_4'));
        $manager->persist($person);

        $manager->flush();
    }

    #[\Override]
    public function getDependencies()
    {
        return [
            AddressFixtures::class,
        ];
    }

    private function getAddress(string $name): Address
    {
        $address = $this->getReference($name);

        if (!($address instanceof Address)) {
            throw new \RuntimeException(sprintf('Cannot get %s named %s', Address::class, $name));
        }

        return $address;
    }
}
