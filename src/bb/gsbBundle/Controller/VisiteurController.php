<?php

namespace bb\gsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use bb\gsbBundle\Entity\Visiteur ;
use bb\gsbBundle\Entity\VisiteurRepository ;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\BrowserKit\Response;
use bb\gsbBundle\Entity\Fraisforfait;
use bb\gsbBundle\Entity\Fichefraisforfait;
use bb\gsbBundle\Entity\Fichefraishorsforfait;
use Symfony\Component\HttpFoundation\Session\Session ;


class VisiteurController extends Controller
{
    public function accueilGestionnaireAction(){
        return $this->render('bbgsbBundle:Visiteur:accueilVisiteur.html.twig') ;
    }
    
    
    
    public function indexAction()
    {
        $form = $this->createFormBuilder()
            ->add('login', 'text', array ('required' => true))
            ->add('mdp','password', array('label' => 'Mot de passe', 'required' => true))
            ->add('Connexion', 'submit' )
            ->add('Annuler', 'reset' )
            ->getForm() ;

        $request = $this->get('request');
        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $visiteur = $em->getRepository('bbgsbBundle:Visiteur');
            $session = $this->getRequest()->getSession() ;
            $formulaire = $form->getData() ;
            $login = $formulaire['login'];
            $mdp = $formulaire['mdp'];

            $connexion = $visiteur->findOneBy(array('login' => $login, 'mdp' => $mdp));

            if($connexion != null){
                
                $nom = $connexion->getNom() ;
                $prenom = $connexion->getPrenom() ;
                $id = $connexion->getId() ;
                
                $session->set('nom', $nom) ;
                $session->set('prenom', $prenom) ;
                $session->set('id', $id) ;
                
                
                return $this->redirectToRoute('accueil_visiteur',
                        array('nom' => $nom, 
                            'prenom'=>$prenom, 
                            'form'=>$form->createView())) ;
                       
            }
        }

        return $this->render('bbgsbBundle:Visiteur:formulaireConnexionVisiteur.html.twig', 
                array('form' => $form->createView())) ;
              

    }
    
    
    public function FraisForfaitAction (){
        $date = date("d-m-Y");
        $dateExplode = explode("-", $date);
        $dates = $dateExplode[0] ;
        $mois = $dateExplode[1];
        $annee = $dateExplode[2] ;

   
        if($dateExplode[0] <= 19 && $dateExplode[0] >= 1) {
        $formSaisie = $this->createFormBuilder()
                ->add('mois', 'text', array('max_length' => 2,
                    'data' => $mois - 1,
                    'disabled' => true
                                        ))
                ->add('annee', 'text', array('max_length' => 4,
                    'data' => $annee,
                    'disabled' => true))
                
                ->getForm() ;
        }
        
        if($dateExplode[0] >= 20 && $dateExplode[0] <= 31) {
        $formSaisie = $this->createFormBuilder()
                ->add('mois', 'text', array('max_length' => 2,
                    'data' => $mois ,
                    'disabled' => true
                                        ))
                ->add('annee', 'text', array('max_length' => 4,
                    'data' => $annee,
                    'disabled' => true))
                
                ->getForm() ;
        }
        
        
        $formFicheFraisForfait = $this->createFormBuilder()
                ->add('repasMidi', 'number', array('label' => 'Repas midi', 'required' => true ))
                ->add('nuitee', 'number', array('label' => 'Nuitées', 'required' => true ))
                ->add('etape', 'number', array('label' => 'Etape', 'required' => true))
                ->add('km', 'number', array('label' => 'km', 'required' => true)) 
                ->add('valider', 'submit' )
                ->add('annuler', 'reset' )
                ->getForm() ;
 
     
      $request = Request::createFromGlobals() ;
      $formFicheFraisForfait->handleRequest($request) ;
        
        if($request->getMethod() == 'POST' && $formFicheFraisForfait->isValid()){
            
            $ficheFraisForfait = new Fichefraisforfait() ;
            
             $mois = $formSaisie['mois']->getData();
             $repasMidi = $formFicheFraisForfait['repasMidi']->getData() ;
             $nuitee = $formFicheFraisForfait['nuitee']->getData() ;
             $etape = $formFicheFraisForfait['etape']->getData() ;
             $km = $formFicheFraisForfait['km']->getData() ;
             
                 
            $em = $this->getDoctrine()->getManager();
            $visiteur = $em->getRepository('bbgsbBundle:Visiteur');
            $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;

             $ficheFraisForfait->setDate($dates) ;
             $ficheFraisForfait->setMois($mois);
             $ficheFraisForfait->setAnnee($annee);
             $ficheFraisForfait->setRepasmidi($repasMidi) ;
             $ficheFraisForfait->setNuitee($nuitee) ;
             $ficheFraisForfait->setEtape($etape) ;
             $ficheFraisForfait->setKm($km) ;
             $ficheFraisForfait->setNomvisiteur($nomVisiteur) ;
             $ficheFraisForfait->setPrenomvisiteur($prenomVisiteur);
             $fraisForfait = $this->getDoctrine()->getManager()->getRepository('bbgsbBundle:Fraisforfait');
             
             $prixUnitaireForfaitEtape = $fraisForfait->find('ETP')->getMontant() ;
             $prixUnitaireFraisKm = $fraisForfait->find('KM')->getMontant() ;
             $prixUnitaireNuiteeHotel = $fraisForfait->find('NUI')->getMontant() ;
             $prixUnitaireRepasRestaurant = $fraisForfait->find('REP')->getMontant() ;
             
             
              $ficheFraisForfait->setPrixetape($prixUnitaireForfaitEtape * $etape);
              $ficheFraisForfait->setPrixkm($prixUnitaireFraisKm * $km);
              $ficheFraisForfait->setPrixnuitee($prixUnitaireNuiteeHotel * $nuitee) ;
             /*correspond au prix repasRestaurant*/
             $ficheFraisForfait->setPrixrepasmidi($prixUnitaireRepasRestaurant * $repasMidi) ;
            
                    

             $em = $this->getDoctrine()->getManager();

             $em->persist($ficheFraisForfait);
             $em->flush();
             
             return $this->render('bbgsbBundle:Visiteur:FraisSauvegarde.html.twig') ;
                      
        }
       
         return $this->render('bbgsbBundle:Visiteur:creerFraisForfait.html.twig', array('formSaisie'=>$formSaisie->createView(),
                                                'formFraisForfait' => $formFicheFraisForfait->createView())) ;
                                                 
            
            
    }
    
    public function fraisHorsForfaitAction(){
        
        $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;


            $formFicheFraisHorsForfait = $this->createFormBuilder()
                ->add('date', 'date', array('label' => 'Date', 'required' => true, 'format' => 'd-M-y'))
                ->add('libelle', 'text', array('label' => 'Libelle', 'required' => true))
                ->add('quantite', 'number', array('label' => 'Quantite', 'required' => true))
                ->add('prixUnitaire', 'money', array('label' => 'Prix Unitaire', 'required'=>true))
                ->add('valider', 'submit' )
                ->add('annuler', 'reset' )
                ->getForm() ;
            
            $request = Request::createFromGlobals() ;
            $formFicheFraisHorsForfait->handleRequest($request) ;
        
        if($request->getMethod() == 'POST' && $formFicheFraisHorsForfait->isValid()){
            
            $ficheFraisHorsForfait = new Fichefraishorsforfait() ;
            
            
             $date = $formFicheFraisHorsForfait['date']->getData();
             $libelle = $formFicheFraisHorsForfait['libelle']->getData() ;
             $qte = $formFicheFraisHorsForfait['quantite']->getData() ;
             $prixUnitaire = $formFicheFraisHorsForfait['prixUnitaire']->getData() ;
             
             $ficheFraisHorsForfait->setDate($date) ;
             $ficheFraisHorsForfait->setLibelle($libelle) ;
             $ficheFraisHorsForfait->setQte($qte) ;
             $ficheFraisHorsForfait->setPrixunitaire($prixUnitaire);
             $ficheFraisHorsForfait->setMontant($prixUnitaire * $qte) ;
             $ficheFraisHorsForfait->setNomvisiteur($nomVisiteur) ;
             $ficheFraisHorsForfait->setPrenomvisiteur($prenomVisiteur);
          
            
             $em = $this->getDoctrine()->getManager();

             $em->persist($ficheFraisHorsForfait);
             $em->flush();
            

            
            return $this->render('bbgsbBundle:Visiteur:FraisHorsForfaitSauvegarde.html.twig') ;
        }
            
            return $this->render('bbgsbBundle:Visiteur:creerFraisHorsForfait.html.twig', array(
                    'formFicheFraisHorsForfait' => $formFicheFraisHorsForfait -> createView())) ;
    
}
    public function consulterFraisForfaitAction(){
                    
            $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;
            
             $ficheFraisForfait = $this->getDoctrine()->getRepository('bbgsbBundle:Fichefraisforfait') 
                ->findBy(array('nomvisiteur' => $nomVisiteur, 'prenomvisiteur' => $prenomVisiteur));
             
             return $this->render('bbgsbBundle:Visiteur:consulterFraisForfait.html.twig', array(
                 'ficheFraisForfait' => $ficheFraisForfait));
    
}

    public function modifierFicheFraisForfaitAction($idfichefrais, Request $request){
        
        
         $ficheFraisForfait = $this->getDoctrine()
                                   ->getManager()
                                   ->getRepository('bbgsbBundle:Fichefraisforfait')
                                   ->find(array('idfichefrais' => $idfichefrais)) ; 
         
         $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;
                                   
         $form= $this->get('form.factory')->createBuilder('form', $ficheFraisForfait)
                
            ->add('repasmidi')
            ->add('nuitee')
            ->add('etape')
            ->add('km')
             
                 ->add('sauvegarder','submit')
            ->getForm() ;
         
         $request = Request::createFromGlobals() ;
        $form->handleRequest($request);
        
        if ($form->isValid()) {
      
            $em = $this->getDoctrine()->getManager();
            
           
             $repasMidi = $form['repasmidi']->getData() ;
             $nuitee = $form['nuitee']->getData() ;
             $etape = $form['etape']->getData() ;
             $km = $form['km']->getData() ;
             
             
             $fraisForfait = $this->getDoctrine()->getManager()->getRepository('bbgsbBundle:Fraisforfait');
             
             $prixUnitaireForfaitEtape = $fraisForfait->find('ETP')->getMontant() ;
             $prixUnitaireFraisKm = $fraisForfait->find('KM')->getMontant() ;
             $prixUnitaireNuiteeHotel = $fraisForfait->find('NUI')->getMontant() ;
             $prixUnitaireRepasRestaurant = $fraisForfait->find('REP')->getMontant() ;
             
             
              $ficheFraisForfait->setPrixetape($prixUnitaireForfaitEtape * $etape);
              $ficheFraisForfait->setPrixkm($prixUnitaireFraisKm * $km);
              $ficheFraisForfait->setPrixnuitee($prixUnitaireNuiteeHotel * $nuitee) ;
             /*correspond au prix repasRestaurant*/
             $ficheFraisForfait->setPrixrepasmidi($prixUnitaireRepasRestaurant * $repasMidi) ;
             $ficheFraisForfait->setNomvisiteur($nomVisiteur) ;
             $ficheFraisForfait->setPrenomvisiteur($prenomVisiteur);
             
            $em->persist($ficheFraisForfait);
            $em->flush();  
            return $this->render('bbgsbBundle:Visiteur:FraisHorsForfaitSauvegarde.html.twig') ;
        
    }
    
    return $this->render('bbgsbBundle:Visiteur:modifierFraisForfait.html.twig',
            array('form' => $form -> createView())); 

    }
    
//    public function supprimerFicheFraisForfaitAction($idfichefrais){
//        $fichefraisforfait = $this->getDoctrine()
//                        ->getManager()
//                        ->getRepository('bbgsbBundle:Fichefraisforfait')
//                        ->find($idfichefrais);
//        
//        if (!$fichefraisforfait) {
//            throw $this->createNotFoundException('Aucune fiche trouvée');
//        }
//        else {
//            $em = $this->getDoctrine()->getEntityManager();
//            $em->remove($fichefraisforfait);
//            $em->flush();
//        }
//    
//        return $this->render('bbgsbBundle:Visiteur:ficheSupprimee.html.twig') ;
//                
//    }
    
       public function consulterFraisHorsForfaitAction(){
                    
            $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;
            
             $ficheFraisHorsForfait = $this->getDoctrine()->getRepository('bbgsbBundle:Fichefraishorsforfait') 
                ->findBy(array('nomvisiteur' => $nomVisiteur, 'prenomvisiteur' => $prenomVisiteur));
             
             return $this->render('bbgsbBundle:Visiteur:consulterFraisHorsForfait.html.twig', array(
                 'ficheFraisHorsForfait' => $ficheFraisHorsForfait));
    
}

public function modifierFicheFraisHorsForfaitAction($idfichefraishorsforfait, Request $request){
        
        
         $ficheFraisHorsForfait = $this->getDoctrine()
                                   ->getManager()
                                   ->getRepository('bbgsbBundle:Fichefraishorsforfait')
                                   ->find(array('idfichefraishorsforfait' => $idfichefraishorsforfait)) ; 
         
         $nomVisiteur = $this->getRequest()->getSession()->get('nom') ;
            $prenomVisiteur = $this->getRequest()->getSession()->get('prenom') ;
                                   
         $form= $this->get('form.factory')->createBuilder('form', $ficheFraisHorsForfait)
                
          ->add('date')
            ->add('libelle')
            ->add('qte')
            ->add('prixunitaire')
            ->add('montant')
           
             
                 ->add('sauvegarder','submit')
            ->getForm() ;
         
         $request = Request::createFromGlobals() ;
        $form->handleRequest($request);
        
        if ($form->isValid()) {
      
            $em = $this->getDoctrine()->getManager();
            
           
             $repasMidi = $form['libelle']->getData() ;
             $nuitee = $form['qte']->getData() ;
             $etape = $form['prixunitaire']->getData() ;
             
             
             
             $fraisHorsForfait = $this->getDoctrine()->getManager()->getRepository('bbgsbBundle:Fichefraishorsforfait');
             
     
             
             
              $ficheFraisForfait->setPrixetape($prixUnitaireForfaitEtape * $etape);
              $ficheFraisForfait->setPrixkm($prixUnitaireFraisKm * $km);
              $ficheFraisForfait->setPrixnuitee($prixUnitaireNuiteeHotel * $nuitee) ;
             /*correspond au prix repasRestaurant*/
             $ficheFraisForfait->setPrixrepasmidi($prixUnitaireRepasRestaurant * $repasMidi) ;
             $ficheFraisForfait->setNomvisiteur($nomVisiteur) ;
             $ficheFraisForfait->setPrenomvisiteur($prenomVisiteur);
             
            $em->persist($ficheFraisForfait);
            $em->flush();  
            return $this->render('bbgsbBundle:Visiteur:FraisHorsForfaitSauvegarde.html.twig') ;
        
    }
    
    return $this->render('bbgsbBundle:Visiteur:modifierFraisForfait.html.twig',
            array('form' => $form -> createView())); 

    }
    
    public function supprimerFicheFraisForfaitAction($idfichefrais){
        $fichefraisforfait = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('bbgsbBundle:Fichefraisforfait')
                        ->find($idfichefrais);
        
        if (!$fichefraisforfait) {
            throw $this->createNotFoundException('Aucune fiche trouvée');
        }
        else {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($fichefraisforfait);
            $em->flush();
        }
    
        return $this->render('bbgsbBundle:Visiteur:ficheSupprimee.html.twig') ;
                
    }
    
    public function supprimerFicheFraisHorsForfaitAction($idfichefraishorsforfait){
        $fichefraishorsforfait = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('bbgsbBundle:Fichefraishorsforfait')
                        ->find($idfichefraishorsforfait);
        
        if (!$fichefraishorsforfait) {
            throw $this->createNotFoundException('Aucune fiche trouvée');
        }
        else {
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($fichefraishorsforfait);
            $em->flush();
        }
    
        return $this->render('bbgsbBundle:Visiteur:ficheSupprimee.html.twig') ;
                
    }


}