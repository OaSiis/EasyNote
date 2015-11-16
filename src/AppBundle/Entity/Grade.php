<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="gradeNumber", type="integer")
     */
    private $gradeNumber;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gradeNumber
     *
     * @param integer $gradeNumber
     *
     * @return Grade
     */
    public function setGradeNumber($gradeNumber)
    {
        $this->gradeNumber = $gradeNumber;

        return $this;
    }

    /**
     * Get gradeNumber
     *
     * @return integer
     */
    public function getGradeNumber()
    {
        return $this->gradeNumber;
    }
}

