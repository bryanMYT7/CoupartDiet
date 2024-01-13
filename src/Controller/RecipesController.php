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
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Recipe::class);

        $recipes = $repository->findAll();//Seleclt * FROM 'post';

        dump($recipes);

        return $this->render("/pages/home.html.twig", ["Recipes" => $recipes]);
    }

    /**
     * @Route("/recettes/ajout")
     */
    public function RecipesAdd(Request $request, ManagerRegistry $doctrine):Response
    {   
         //Ajout d'une recette
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($recipe);
            $em->flush();
            dump($request);
            return $this->redirectToRoute("home");
        }
        return $this->render('/pages/form.html.twig', [
            "formRecipe" => $form->createView()
        ]);
    }
    /**
    * @Route("/recettes/{id}", name="recettes")
    */
    public function read($id, ManagerRegistry $doctrine): Response

    {   $repository = $doctrine->getRepository(Recipe::class);

        $recipe = $repository->find($id);//Seleclt * FROM 'post';
        
        dump($recipe);
        
         return $this->render('/pages/recipe.html.twig', [
        'Recipe' => $recipe,
    ]);
    }
}
