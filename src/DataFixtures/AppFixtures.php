<?php


namespace App\DataFixtures;



use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture {


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
       for ($i=0; $i<40; $i++){

           $job= new Job();
           $job->setTitle("job N° ". $i);
           $job->setSlug('job- '.$i);
           $job->setDescription("Lorem ispsum atchoum");
           $job->setCategories($i);
           $manager->persist($job);
       }

       $manager->flush();
    }


}
