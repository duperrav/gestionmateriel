<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\Incident;
use App\Entity\Salle;
use App\Entity\Equipement;
use App\Entity\User;

class Gestionnaire extends AbstractController
{
	/**
	 * @Route("hello")
	 */
	public function hello():Response
	{
		$reponse  = "<html>";
		$reponse  = "<body>";
		$reponse .= "   <h1>Recto de hall agissante</h1>";
		$reponse .= "</body>";
		$reponse .= "</html>";
        
		return new Response($reponse);
	}

   
	/**
	 * @Route("connexion")
	 */
	public function connexion()
	{
	  return $this->render(
			"authentifier.html.twig"
			
		);
	  
	}


	  /**
	  * @Route("enseignant", name="ens")
	  */
	 public function enseignant(Request $request)
	{
	  
	   $tabSall = $this->getDoctrine()
	   ->getRepository(Salle::class)->findall();

	   return $this->render (
			 "pageEnseignant.html.twig",
			 [
				 "tableau" => $tabSall
			 ]
		 );        
	  
	 }


 //   /**
//	 * @Route("accesEquipement")
//	 */


  //  public function accesEquipement(Request $request)
//	{
  

//  $equipement = $this->getDoctrine()->getRepository(::class)
// ->findAll();

//  $form->handleRequest($request);
 // Est-ce qu’il y a des données, et sont-elles valides :
 // => si oui, on traite.
 //if ($form->isSubmitted() && $form->isValid())
 //{
 // Lecture des données reçues
 // La variable $donnees se comportent ensuite comme $_GET ou $_POST
 //$donnees = $form->getData();
 //... ici sans doute un return ou une redirection ...
 //}

		        
	  
//	}




	/**
	 * @Route("technicien")
	 */

	public function technicien()
	{
	  $tabIncid = $this->getDoctrine()
	   ->getRepository(Incident::class)->findall();

	   return $this->render (
			 "pageTechnicien.html.twig",
			 [
				 "problemes" => $tabIncid
			 ]
		 );        
	  
	}



/**
	 * @Route("equipement")
	 */

	public function equipement()
	{
	  $tabIncid = $this->getDoctrine()
	   ->getRepository(Equipement::class)->findall();

	   return $this->render (
			 "equipement.html.twig",
			 [
				 "materiel" => $tabIncid
			 ]
		 );        
	  
	

}





}




