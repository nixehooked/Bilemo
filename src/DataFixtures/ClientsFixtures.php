<?php


namespace App\DataFixtures;

use App\Entity\Clients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientsFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $admin_client = new Clients();
        $admin_client->setEmail('bilemo@gmail.com');
        $admin_client->setName('bilemo');
        $admin_client->setPassword($this->passwordEncoder->encodePassword(
            $admin_client,
            'admin'
        ));
        $admin_client->setRoles(array('ROLE_SUPER_ADMIN'));
        $manager->persist($admin_client);

        $manager->flush();
    }
}