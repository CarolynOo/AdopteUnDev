<?php
namespace App\Controller;
use App\Entity\Users;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Validation;



class FormController extends Controller
{

    /**
     * @Route("/job/form")
     * @Route("/job/user_connexion")
     *
     *
     */
    public function addUserAction(Request $request)
    {
        // On crée un objet user
        $user = new Users();


        $form = $this->get('form.factory')->createBuilder(FormType::class, $user)

            ->add('userName',    TextType::class)
            ->add('userEmail', EmailType::class)
            ->add('save',      SubmitType::class)
            ->getForm()
        ;

        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes

            if ($form->isValid()) {
                // On enregistre notre objet $user dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'User bien enregistré.');

                // retourne la vue correspondante a la connexion
                return $this->render('job/user_connexion.html.twig', ['user' => $user]);
            }
        }


        return $this->render('job/form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}