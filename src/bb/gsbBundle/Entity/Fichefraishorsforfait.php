<?php

namespace bb\gsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefraishorsforfait
 */
class Fichefraishorsforfait
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $qte;

    /**
     * @var float
     */
    private $prixunitaire;

    /**
     * @var float
     */
    private $montant;

    /**
     * @var string
     */
    private $nomvisiteur;

    /**
     * @var string
     */
    private $prenomvisiteur;

    /**
     * @var integer
     */
    private $idfichefraishorsforfait;


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Fichefraishorsforfait
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Fichefraishorsforfait
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     * @return Fichefraishorsforfait
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer 
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set prixunitaire
     *
     * @param float $prixunitaire
     * @return Fichefraishorsforfait
     */
    public function setPrixunitaire($prixunitaire)
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    /**
     * Get prixunitaire
     *
     * @return float 
     */
    public function getPrixunitaire()
    {
        return $this->prixunitaire;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Fichefraishorsforfait
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set nomvisiteur
     *
     * @param string $nomvisiteur
     * @return Fichefraishorsforfait
     */
    public function setNomvisiteur($nomvisiteur)
    {
        $this->nomvisiteur = $nomvisiteur;

        return $this;
    }

    /**
     * Get nomvisiteur
     *
     * @return string 
     */
    public function getNomvisiteur()
    {
        return $this->nomvisiteur;
    }

    /**
     * Set prenomvisiteur
     *
     * @param string $prenomvisiteur
     * @return Fichefraishorsforfait
     */
    public function setPrenomvisiteur($prenomvisiteur)
    {
        $this->prenomvisiteur = $prenomvisiteur;

        return $this;
    }

    /**
     * Get prenomvisiteur
     *
     * @return string 
     */
    public function getPrenomvisiteur()
    {
        return $this->prenomvisiteur;
    }

    /**
     * Get idfichefraishorsforfait
     *
     * @return integer 
     */
    public function getIdfichefraishorsforfait()
    {
        return $this->idfichefraishorsforfait;
    }
}
