<?php


namespace Application\Entity;

class Training
{
    private $start_date;
    private $end_date;
    private $students_nbr;
    private $title;
    private $description;
    private $duration;


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