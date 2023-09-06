<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Testauthpers;
use App\Entity\User;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class gestionPers extends AbstractController
{
    /**
     * @Route("hello")
     */
    public function hello()
    {
        $listePers = $this->getDoctrine()->getRepository(Testauthpers::class)->findAll();

        $reponse  = "<html>";
        $reponse  = "<body>";
        $reponse .= "   <h1>Hello</h1>";
        $reponse .= "</body>";
        $reponse .= "</html>";
        

        return $this->render("liste.html.twig", ["liste"=>$listePers]);
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
        return $this->render("confirmationLogin.html.twig", ["nom"=>$this->getUser()->getLogin()]);
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