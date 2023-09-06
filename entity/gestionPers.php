<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Testauthpers;


use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class gestionPers extends AbstractController
{
    // gestion session selon doc 
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }




    /**
     * @Route("hello", name="confirmationLogin")
     */
    public function hello()
    {
        $listePers = $this->getDoctrine()->getRepository(Testauthpers::class)->findAll();;

       
        $nomSession = $this->session->get('nom', '_inconnu_');

        $login="--";
        if ($this->getUser()) $login = $this->getUser()->getLogin();

        return $this->render("liste.html.twig", 
            ["liste"=>$listePers,
             "login" => $login,
             "nomSession" => $nomSession
             ]);
    }

    /** 
     * @Route("creerUtil/{nom}/{password}")
     */
    public function creerUtil(UserPasswordEncoderInterface $passwordEncoder, $nom, $password)
    {
        $nouvUser = new User();
 
        $nouvUser->setLogin($nom);
        $nouvUser->setPassword($passwordEncoder->encodePassword($nouvUser,$password));
        $nouvUser->setRoles(["ROLE_YOPMAN","ROLE_YOPMASTER","RIEN_AUSSI"]);

        $this->getDoctrine()->getManager()->persist($nouvUser);
        $this->getDoctrine()->getManager()->flush();

        return $this->render("liste.html.twig", ["liste"=>"youpi".$nouvUser->getId()]);
    }


    /**
     * @Route("confirmationLogin", name="conf")
     */
    public function confirmationLogin()
    {
        //$unUtil = $this->getDoctrine()->getRepository(Testauthpers::class)
        //->findOneByUser($this->getUser()); // findOneBy, pour ne récupérer qu'une instance et pas un tableau

        $this->session->set('nom',$unUtil->getNoml());

        return $this->render("confirmationLogin.html.twig", 
        [
            "nom"=>$this->getUser()->getLogin(),
            "util"=>$this->getDoctrine()->getRepository(Testauthpers::class)
                    ->findByUser($this->getUser()),
            "unUtil"=>$unUtil

        ]
        );
    }

    /**
     * @Route("testRestriction")
     */
    public function testRestriction()
    {
        
        if ($this->isGranted('ROLE_YOPMAN')) {
            return $this->render("liste.html.twig", ["liste"=>"YOPMAN"]);
         }
    

        return $this->render("liste.html.twig", ["liste"=>"topSecret"]);
    }

    /**
     * @Route("testRestrictionAnnotation")
     * @IsGranted("ROLE_ADMIN")
     */
    public function testRestrictionAnnotation()
    {
        
        return $this->render("liste.html.twig", ["liste"=>"topSecret"]);
    }
}