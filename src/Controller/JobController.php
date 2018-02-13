<?php

namespace App\Controller;

use App\Entity\Job;
use App\User\Generator\JobMessageGenerator;
use App\User\Generator\MessageGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class JobController extends Controller {

    
       /**
        * @Route("/", name="index")
        * 
        * @return Response
        */
    
    
	public function indexAction() {

		$offre = new \stdClass();
		$offre->titre = 'On recherche un dev';
		$offre->contenu='index';
		return $this->render('base.html.twig', [
				'offre'=> $offre
		]);
	}

        /**
         *
         * @Route("/job/contact")
         * @return Response
         */
	public function contactAction() {
		return $this->render('job/contact.html.twig');
	}


         /**
         * @Route("/job/write")
         * @return Response
         */
    public function jobWriteAnnonceAction() : Response
    {
        $em = $this->getDoctrine()->getManager();

        $job = new Job();
        $job->setTitle('Dev PHP');
        $job->setDescription('Minimum 5 ans d\'expérience');
        $job->setCategories(2);

        $em->persist($job);

        $em->flush();

        return $this->render('job/job_write_annonce.html.twig', ['job' => $job]);
    }

    /**
     * @Route("/job/show/{id}", requirements={"id"="\d+"})
     * @return Response
     */
    public function jobShowAnnonceAction(int $id)
    {
        $job = $this->getDoctrine()->getRepository(Job::class)->find($id);

        if(!$job){
            throw $this->createNotFoundException('L\'offre N°' . $id . 'n\'existe pas, kiffe ton chômage!');
        }

        return $this->render('job/job_show_annonce.html.twig', ['job' => $job]);
    }

    /**
     * @Route("/job/{id}")
     * @return Response
     */

    public function jobShowAction($id) {

        return $this->render('job/job_show.html.twig', ['id' => $id]);
    }

    /**
     * @Route("/testMessage")
     * @return Response
     */
    public function testAction() {
        $message = $this->get('userGenMessage')->getRandomMessage();
        var_dump($message); exit;
    }

    /**
     * @Route("/test2Message")
     * @return Response
     */
    public function secondTestAction()
    {
        $message = $this->get('jobGenMessage')->getRandomMessage();
        var_dump($message); exit;
    }

}