<?php


namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="training")
 */
class Training
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    private $id;

    /**
     * @ORM\Column(name="started_at",  type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(name="finished_at", type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(name="students_nbr")
     */
    private $students_nbr;

    /**
     * @ORM\Column(name="title")
     */

    private $title;

    /**
     * @ORM\Column(name="description")
     */
    private $description;


    /**
     * @param mixed $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitle():string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getStartDate():\DateTime
    {
        return $this->start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate():\DateTime
    {
        return $this->end_date;
    }

    /**
     * @return mixed
     */
    public function getStudentsNbr():int
    {
        return $this->students_nbr;
    }


    /**
     * @param mixed $start_date
     */
    public function setStartDate(\DateTime $start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate(\DateTime $end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @param mixed $students_nbr
     */
    public function setStudentsNbr(int $students_nbr)
    {
        $this->students_nbr = $students_nbr;
    }

    public function duration():int
    {
        return ($this->getEndDate()->diff($this->getStartDate())->days+1);
    }

}