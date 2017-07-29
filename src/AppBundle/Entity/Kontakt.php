<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kontakt
 *
 * @ORM\Table(name="kontakt")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KontaktRepository")
 */
class Kontakt
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
     * @ORM\Column(name="vorname", type="string", length=255)
     */
    private $vorname;

    /**
     * @var string
     *
     * @ORM\Column(name="nachname", type="string", length=255)
     */
    private $nachname;

    /**
     * @var string
     *
     * @ORM\Column(name="betreff", type="string", length=255)
     */
    private $betreff;

    /**
     * @var string
     *
     * @ORM\Column(name="nachricht", type="text")
     */
    private $nachricht;

    /**
     * @var string
     *
     * @ORM\Column(name="anrede", type="string", length=255)
     */
    private $anrede;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
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
     * Set vorname
     *
     * @param string $vorname
     *
     * @return Kontakt
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
     * @return Kontakt
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
     * Set betreff
     *
     * @param string $betreff
     *
     * @return Kontakt
     */
    public function setBetreff($betreff)
    {
        $this->betreff = $betreff;

        return $this;
    }

    /**
     * Get betreff
     *
     * @return string
     */
    public function getBetreff()
    {
        return $this->betreff;
    }

    /**
     * Set nachricht
     *
     * @param string $nachricht
     *
     * @return Kontakt
     */
    public function setNachricht($nachricht)
    {
        $this->nachricht = $nachricht;

        return $this;
    }

    /**
     * Get nachricht
     *
     * @return string
     */
    public function getNachricht()
    {
        return $this->nachricht;
    }

    /**
     * Set anrede
     *
     * @param string $anrede
     *
     * @return Kontakt
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
     * Set email
     *
     * @param string $email
     *
     * @return Kontakt
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

