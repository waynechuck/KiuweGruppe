<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bewerbungen
 *
 * @ORM\Table(name="bewerbungen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BewerbungenRepository")
 */
class Bewerbungen
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
     * @ORM\Column(name="Anrede", type="string", length=255)
     */
    private $anrede;

    /**
     * @var string
     *
     * @ORM\Column(name="Vorname", type="string", length=255)
     */
    private $vorname;

    /**
     * @var string
     *
     * @ORM\Column(name="Nachname", type="string", length=255)
     */
    private $nachname;

    /**
     * @var string
     *
     * @ORM\Column(name="Strasse", type="string", length=255)
     */
    private $strasse;

    /**
     * @var int
     *
     * @ORM\Column(name="Hausnummer", type="integer")
     */
    private $hausnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="Postleitzahl", type="integer")
     */

    private $postleitzahl;

    /**
     * @var string
     *
     * @ORM\Column(name="Wohnort", type="string", length=255)
     */
    private $wohnort;

    /**
     * @var int
     *
     * @ORM\Column(name="Telefon_privat", type="integer")
     */
    private $telefonPrivat;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefon_mobil", type="string", length=255)
     */
    private $telefonMobil;

    /**
     * @var string
     *
     * @ORM\Column(name="Bewerbungsschreiben", type="string")
     * @Assert\NotBlank(message="Bitte laden Sie das Bewerbungsschreiben als PDF-File hoch!")
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF")
     */
    private $bewerbungsschreiben;

    /**
     * @var string
     *
     * @ORM\Column(name="Lebenslauf", type="string")
     * @Assert\NotBlank(message="Bitte laden Sie den Lebenslauf als PDF-File hoch!")
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF")
     */
    private $lebenslauf;

    /**
     * @var string
     *
     * @ORM\Column(name="Weitere_Dokumente", type="string")
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF")
     */
    private $weitereDokumente;

    /**
     * @var string
     *
     * @ORM\Column(name="EMail", type="string", length=255)
     *
     */
    private $email;


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
     * Set anrede
     *
     * @param string $anrede
     *
     * @return Bewerbungen
     */
    public function setAnrede($anrede)
    {
        $this->anrede = $anrede;

        return $this;
    }

    /**
     * Get anrede
     *
     * @return string
     */
    public function getAnrede()
    {
        return $this->anrede;
    }

    /**
     * Set vorname
     *
     * @param string $vorname
     *
     * @return Bewerbungen
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set nachname
     *
     * @param string $nachname
     *
     * @return Bewerbungen
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

        return $this;
    }

    /**
     * Get nachname
     *
     * @return string
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Set strasse
     *
     * @param string $strasse
     *
     * @return Bewerbungen
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;

        return $this;
    }

    /**
     * Get strasse
     *
     * @return string
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

    /**
     * Set hausnummer
     *
     * @param integer $hausnummer
     *
     * @return Mitarbeiter
     */
    public function setHausnummer($hausnummer)
    {
        $this->hausnummer = $hausnummer;

        return $this;
    }

    /**
     * Get hausnummer
     *
     * @return int
     */
    public function getHausnummer()
    {
        return $this->hausnummer;
    }

    /**
     * Set postleitzahl
     *
     * @param integer $postleitzahl
     *
     * @return Bewerbungen
     */
    public function setPostleitzahl($postleitzahl)
    {
        $this->postleitzahl = $postleitzahl;

        return $this;
    }

    /**
     * Get postleitzahl
     *
     * @return int
     */
    public function getPostleitzahl()
    {
        return $this->postleitzahl;
    }

    /**
     * Set wohnort
     *
     * @param string $wohnort
     *
     * @return Bewerbungen
     */
    public function setWohnort($wohnort)
    {
        $this->wohnort = $wohnort;

        return $this;
    }

    /**
     * Get wohnort
     *
     * @return string
     */
    public function getWohnort()
    {
        return $this->wohnort;
    }

    /**
     * Set telefonPrivat
     *
     * @param integer $telefonPrivat
     *
     * @return Bewerbungen
     */
    public function setTelefonPrivat($telefonPrivat)
    {
        $this->telefonPrivat = $telefonPrivat;

        return $this;
    }

    /**
     * Get telefonPrivat
     *
     * @return int
     */
    public function getTelefonPrivat()
    {
        return $this->telefonPrivat;
    }

    /**
     * Set telefonMobil
     *
     * @param string $telefonMobil
     *
     * @return Bewerbungen
     */
    public function setTelefonMobil($telefonMobil)
    {
        $this->telefonMobil = $telefonMobil;

        return $this;
    }

    /**
     * Get telefonMobil
     *
     * @return string
     */
    public function getTelefonMobil()
    {
        return $this->telefonMobil;
    }

    /**
     * Set bewerbungsschreiben
     *
     * @param string $bewerbungsschreiben
     *
     * @return Bewerbungen
     */
    public function setBewerbungsschreiben($bewerbungsschreiben)
    {
        $this->bewerbungsschreiben = $bewerbungsschreiben;

        return $this;
    }

    /**
     * Get bewerbungsschreiben
     *
     * @return string
     */
    public function getBewerbungsschreiben()
    {
        return $this->bewerbungsschreiben;
    }

    /**
     * Set lebenslauf
     *
     * @param string $lebenslauf
     *
     * @return Bewerbungen
     */
    public function setLebenslauf($lebenslauf)
    {
        $this->lebenslauf = $lebenslauf;

        return $this;
    }

    /**
     * Get lebenslauf
     *
     * @return string
     */
    public function getLebenslauf()
    {
        return $this->lebenslauf;
    }

    /**
     * Set weitereDokumente
     *
     * @param string $weitereDokumente
     *
     * @return Bewerbungen
     */
    public function setWeitereDokumente($weitereDokumente)
    {
        $this->weitereDokumente = $weitereDokumente;

        return $this;
    }

    /**
     * Get weitereDokumente
     *
     * @return string
     */
    public function getWeitereDokumente()
    {
        return $this->weitereDokumente;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Mitarbeiter
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}

