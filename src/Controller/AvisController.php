<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisFormType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(Request $request, EntityManagerInterface $entityManager, AvisRepository $avisRepository): Response
    {

        $avisForm = $this->createForm(AvisFormType::class);


        $avisForm->handleRequest($request);

        if ($avisForm->isSubmitted() && $avisForm->isValid()) {
            $formData = $avisForm->getData();
            $name = $formData->getName();
            $commentaire = $formData->getCommentaire();
            $note = $formData->getNote();
            $isActive = $formData->getIsActive();


            $avis = new Avis();
            $avis->setName($name);
            $avis->setCommentaire($commentaire);
            $avis->setNote($note);
            $avis->setIsActive($isActive);

            try {
                $entityManager->persist($avis);
                $entityManager->flush();

                $this->addFlash('success', 'Nous avons pris en compte votre avis');
                return $this->redirectToRoute('home_');
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Une erreur est survenue : ' . $e->getMessage());
            }
        }
            $avis = $avisRepository->findAll();
            $context = compact('avis');
            $context['avis'] = $avis;


        return $this->render('avis/index.html.twig', [
            'avisForm' => $avisForm->createView(),
            'avis' =>$avis,
            
        ]);
    }
}