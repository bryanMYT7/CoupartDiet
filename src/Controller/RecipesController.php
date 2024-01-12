<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class RecipesController  extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function GetHome():Response
    {
        
        return $this->render('/pages/home.html.twig');
    }
    /**
     * @Route("/recettes", name="recipes")
     */
    public function Recipes():Response
    {
        
        return $this->render('/pages/home.html.twig');
    }

    /**
     * @Route("/recettes/new", name="recipes_new")
     */
    public function RecipesAdd(Request $request, ManagerRegistry $doctrine):Response
    {   
         //Ajout d'une recette
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValide()){
            $em = $doctrine->getManager();
            $em->persist($recipe);
            $em->flush();
            return $this->redirectToRoute("recipes");
        }
        return $this->render('/pages/form.html.twig', [
            "formRecipe" => $form->createView()
        ]);
    }
}
