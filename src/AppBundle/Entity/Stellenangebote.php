<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stellenangebote
 *
 * @ORM\Table(name="stellenangebot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StellenangeboteRepository")
 */
class Stellenangebote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Jobbezeichnung", type="string", length=255)
     */
    private $jobbezeichnung;

    /**
     * @var string
     *
     * @ORM\Column(name="Arbeitsort", type="string", length=255)
     */
    private $arbeitsort;

    /**
     * @var string
     *
     * @ORM\Column(name="Zweig", type="string", length=255)
     */
    private $zweig;

    /**
     * @var string
     *
     * @ORM\Column(name="Joblevel", type="string", length=255)
     */
    private $joblevel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Erstelldatum", type="datetime")
     */
    private $erstelldatum;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="Besetzungszeitpunkt", type="datetime")
     */
    private $besetzungszeitpunkt;

    /**
     * @var string
     *
     * @ORM\Column(name="Arbeitsumfeld", type="text")
     */
    private $arbeitsumfeld;

    /**
     * @var string
     *
     * @ORM\Column(name="Aufgaben", type="text")
     */
    private $aufgaben;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set jobbezeichnung
     *
     * @param string $jobbezeichnung
     *
     * @return Stellenangebote
     */
    public function setJobbezeichnung($jobbezeichnung)
    {
        $this->jobbezeichnung = $jobbezeichnung;

        return $this;
    }

    /**
     * Get jobbezeichnung
     *
     * @return string
     */
    public function getJobbezeichnung()
    {
        return $this->jobbezeichnung;
    }

    /**
     * Set arbeitsort
     *
     * @param string $arbeitsort
     *
     * @return Stellenangebote
     */
    public function setArbeitsort($arbeitsort)
    {
        $this->arbeitsort = $arbeitsort;

        return $this;
    }

    /**
     * Get arbeitsort
     *
     * @return string
     */
    public function getArbeitsort()
    {
        return $this->arbeitsort;
    }

    /**
     * Set zweig
     *
     * @param string $zweig
     *
     * @return Stellenangebote
     */
    public function setZweig($zweig)
    {
        $this->zweig = $zweig;

        return $this;
    }

    /**
     * Get zweig
     *
     * @return string
     */
    public function getZweig()
    {
        return $this->zweig;
    }

    /**
     * Set joblevel
     *
     * @param string $joblevel
     *
     * @return Stellenangebote
     */
    public function setJoblevel($joblevel)
    {
        $this->joblevel = $joblevel;

        return $this;
    }

    /**
     * Get joblevel
     *
     * @return string
     */
    public function getJoblevel()
    {
        return $this->joblevel;
    }

    /**
     * Set erstelldatum
     *
     * @param \DateTime $erstelldatum
     *
     * @return Stellenangebote
     */
    public function setErstelldatum($erstelldatum)
    {
        $this->erstelldatum = $erstelldatum;

        return $this;
    }

    /**
     * Get erstelldatum
     *
     * @return \DateTime
     */
    public function getErstelldatum()
    {
        return $this->erstelldatum;
    }

    /**
     * Set besetzungszeitpunkt
     *
     * @param DateTime $besetzungszeitpunkt
     *
     * @return Stellenangebote
     */
    public function setBesetzungszeitpunkt($besetzungszeitpunkt)
    {
        $this->besetzungszeitpunkt = $besetzungszeitpunkt;

        return $this;
    }

    /**
     * Get besetzungszeitpunkt
     *
     * @return \DateTime
     */
    public function getBesetzungszeitpunkt()
    {
        return $this->besetzungszeitpunkt;
    }

    /**
     * Set arbeitsumfeld
     *
     * @param string $arbeitsumfeld
     *
     * @return Stellenangebote
     */
    public function setArbeitsumfeld($arbeitsumfeld)
    {
        $this->arbeitsumfeld = $arbeitsumfeld;

        return $this;
    }

    /**
     * Get arbeitsumfeld
     *
     * @return string
     */
    public function getArbeitsumfeld()
    {
        return $this->arbeitsumfeld;
    }

    /**
     * Set aufgaben
     *
     * @param string $aufgaben
     *
     * @return Stellenangebote
     */
    public function setAufgaben($aufgaben)
    {
        $this->aufgaben = $aufgaben;

        return $this;
    }

    /**
     * Get aufgaben
     *
     * @return string
     */
    public function getAufgaben()
    {
        return $this->aufgaben;
    }
}
