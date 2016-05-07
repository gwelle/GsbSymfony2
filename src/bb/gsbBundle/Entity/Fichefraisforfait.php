<?php

namespace bb\gsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefraisforfait
 *
 * @ORM\Table(name="FicheFraisForfait")
 * @ORM\Entity
 */
class Fichefraisforfait
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFicheFrais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfichefrais;

    /**
     * @var string
     *
     * @ORM\Column(name="nomVisiteur", type="string", length=30, nullable=true)
     */
    private $nomvisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomVisiteur", type="string", length=30, nullable=true)
     */
    private $prenomvisiteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer", nullable=true)
     */
    private $mois;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=true)
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="repasMidi", type="integer", nullable=true)
     */
    private $repasmidi;

    /**
     * @var integer
     *
     * @ORM\Column(name="nuitee", type="integer", nullable=true)
     */
    private $nuitee;

    /**
     * @var integer
     *
     * @ORM\Column(name="etape", type="integer", nullable=true)
     */
    private $etape;

    /**
     * @var integer
     *
     * @ORM\Column(name="km", type="integer", nullable=true)
     */
    private $km;

    /**
     * @var float
     *
     * @ORM\Column(name="prixRepasMidi", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixrepasmidi;

    /**
     * @var float
     *
     * @ORM\Column(name="prixNuitee", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixnuitee;

    /**
     * @var float
     *
     * @ORM\Column(name="prixEtape", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixetape;

    /**
     * @var float
     *
     * @ORM\Column(name="prixKm", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixkm;



    /**
     * Get idfichefrais
     *
     * @return integer 
     */
    public function getIdfichefrais()
    {
        return $this->idfichefrais;
    }

    /**
     * Set nomvisiteur
     *
     * @param string $nomvisiteur
     * @return Fichefraisforfait
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
     * @return Fichefraisforfait
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
     * Set date
     *
     * @param integer $date
     * @return Fichefraisforfait
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set mois
     *
     * @param integer $mois
     * @return Fichefraisforfait
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return integer 
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     * @return Fichefraisforfait
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set repasmidi
     *
     * @param integer $repasmidi
     * @return Fichefraisforfait
     */
    public function setRepasmidi($repasmidi)
    {
        $this->repasmidi = $repasmidi;

        return $this;
    }

    /**
     * Get repasmidi
     *
     * @return integer 
     */
    public function getRepasmidi()
    {
        return $this->repasmidi;
    }

    /**
     * Set nuitee
     *
     * @param integer $nuitee
     * @return Fichefraisforfait
     */
    public function setNuitee($nuitee)
    {
        $this->nuitee = $nuitee;

        return $this;
    }

    /**
     * Get nuitee
     *
     * @return integer 
     */
    public function getNuitee()
    {
        return $this->nuitee;
    }

    /**
     * Set etape
     *
     * @param integer $etape
     * @return Fichefraisforfait
     */
    public function setEtape($etape)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return integer 
     */
    public function getEtape()
    {
        return $this->etape;
    }

    /**
     * Set km
     *
     * @param integer $km
     * @return Fichefraisforfait
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return integer 
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set prixrepasmidi
     *
     * @param float $prixrepasmidi
     * @return Fichefraisforfait
     */
    public function setPrixrepasmidi($prixrepasmidi)
    {
        $this->prixrepasmidi = $prixrepasmidi;

        return $this;
    }

    /**
     * Get prixrepasmidi
     *
     * @return float 
     */
    public function getPrixrepasmidi()
    {
        return $this->prixrepasmidi;
    }

    /**
     * Set prixnuitee
     *
     * @param float $prixnuitee
     * @return Fichefraisforfait
     */
    public function setPrixnuitee($prixnuitee)
    {
        $this->prixnuitee = $prixnuitee;

        return $this;
    }

    /**
     * Get prixnuitee
     *
     * @return float 
     */
    public function getPrixnuitee()
    {
        return $this->prixnuitee;
    }

    /**
     * Set prixetape
     *
     * @param float $prixetape
     * @return Fichefraisforfait
     */
    public function setPrixetape($prixetape)
    {
        $this->prixetape = $prixetape;

        return $this;
    }

    /**
     * Get prixetape
     *
     * @return float 
     */
    public function getPrixetape()
    {
        return $this->prixetape;
    }

    /**
     * Set prixkm
     *
     * @param float $prixkm
     * @return Fichefraisforfait
     */
    public function setPrixkm($prixkm)
    {
        $this->prixkm = $prixkm;

        return $this;
    }

    /**
     * Get prixkm
     *
     * @return float 
     */
    public function getPrixkm()
    {
        return $this->prixkm;
    }
}
