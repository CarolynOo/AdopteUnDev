<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormController extends Controller
{

    /**
     * @Route("/job/form")
     *

     */
            public function new(Request $request)
        {
            // create a task and give it some dummy data for this example
            $user = new Users();
            $user->setUserName('Votre Nom');
            $user->setUserEmail('Votre Email');
            $user->setPassword('Votre Mot De Passe');


            $form = $this->createFormBuilder($user)
                ->add('UserName', TextType::class)
                ->add('UserEmail', TextType::class)
                ->add('Password', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Envoyez'))
                ->getForm();

            return $this->render('job/form.html.twig', array(
                'form' => $form->createView(),
            ));


            /**
             * @Route("/job/form")
             * @Route("/job/connexion")
             *

             */

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated

                $user = $form->getData();
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($user);
                 $em->flush();

                return $this->render('job/user_connexion.html.twig');
            };



        }
}