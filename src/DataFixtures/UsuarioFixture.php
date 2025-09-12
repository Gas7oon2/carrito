<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioFixture extends Fixture
{
     private UserPasswordHasherInterface $passwordHasher;

      // Inyectamos el hasher por constructor
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

   public function load(ObjectManager $manager): void
    {
        for($i=1;$i<=5;$i++){
        $usuario = new Usuario();
        $usuario->setNombre('usuario'.$i);
        $usuario->setEmail('usuario'.$i.'@test.com'); 
        $usuario->setRoles(['ROLE_USER']);

        // password en texto plano
        $plaintextPassword = '123';

        // lo hasheamos
        $hashedPassword = $this->passwordHasher->hashPassword($usuario, $plaintextPassword);
        $usuario->setPassword($hashedPassword);

        $manager->persist($usuario);

        }
        
        $manager->flush();
    }

    
}
