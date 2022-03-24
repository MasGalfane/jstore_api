<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create();
        $user = [];

        for ($i=0; $i < 50; $i++) {
            $user = new User();
            $user->setUsername($faker->name);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password());
            $user->setCreateAt(new \DateTime());
            $manager->persist($user); //On va dire au manager de nous persister l'utilisateur persist-> c'est jsute prendre en compte
            $users[] = $user;
        }

        // Quand on dira manager de flush, quand on appliquera la méthode flush les données seront sauvegarder dans la BDD
        $manager->flush(); 

         $categories = [];

         for ($i=0; $i < 15; $i++) {
            $category = new Category();
            $category->setTitle($faker->text(50));
            $category->setDescription($faker->text(250));
            $category->setImage($faker->imageUrl());
            $manager->persist($category);
            $categories[] = $category;
           
        }
    }
}
