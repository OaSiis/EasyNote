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
     * @var Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="grade")
     */
    private $student;

    /**
     * @var Exam
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Exam", inversedBy="grade")
     */
    private $exam;

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

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return Grade
     */
    public function setStudent(\AppBundle\Entity\Student $student = null)
    {
        $this->student = $student;
        return $this;
    }
    /**
     * Get student
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set exam
     *
     * @param \AppBundle\Entity\Exam $exam
     *
     * @return Grade
     */
    public function setExam(\AppBundle\Entity\Exam $exam = null)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return \AppBundle\Entity\Exam
     */
    public function getExam()
    {
        return $this->exam;
    }
}
