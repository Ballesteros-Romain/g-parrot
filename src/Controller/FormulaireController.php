<?php

namespace App\Controller;

use App\Entity\Formulaire;
use App\Form\ContactFormType;
use App\Repository\HorairesRepository;
use App\Repository\FormulaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormulaireController extends AbstractController
{
    #[Route('/formulaire', name: 'app_formulaire')]
    public function index(HorairesRepository $horairesRepository, Request $request, EntityManagerInterface $em, FormulaireRepository $formulaireRepository): Response
    {
        $marque = $request->query->get('marque');
        $price = $request->query->get('price') / 100;

        $message = $marque ? "Bonjour, je vous contacte au sujet de la voiture $marque à " . number_format($price, 2) . " €" : '';

        $contactForm = $this->createForm(ContactFormType::class);

        if ($marque && $price) {
        $message = $marque ? "Bonjour, je vous contacte au sujet de la voiture $marque à " . number_format($price, 2) . " €" : '';   
    } else {
        $contactForm->handleRequest($request);
        
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $formData = $contactForm->getData();
            $email = $formData->getEmail();
            $name = $formData->getName();
            $surname = $formData->getSurname();
            $tel = $formData->getTel();
            $message = $formData->getMessage();
            
            $contact = new Formulaire();
            $contact->setEmail($email);
            $contact->setName($name);
            $contact->setSurname($surname);
            $contact->setTel($tel);
            $contact->setMessage($message);
            
            try {
                $em->persist($contact);
                $em->flush();
                
                $this->addFlash('success', 'Nous avons pris en compte votre demande');
                return $this->redirectToRoute('home_');
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Une erreur est survenue : ' . $e->getMessage());
            }
        }
    }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'horaires' => $horairesRepository->findAll(),
            'contactForm' => $contactForm->createView(),
            'contact' => $formulaireRepository->findAll(),
            'message' => $message  // Transmettez le message au template Twig
        ]);
    }
}