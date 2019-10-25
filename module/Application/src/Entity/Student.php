<?php


namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="student")
 */

class Student
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    private $id;

    /**
     * @ORM\Column(name="firstname")
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastname")
     */
    private $lastName;

    /**
     * @ORM\Column(name="birthday", type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(name="class")
     */
    private $class;

    /**
     * Many students have Many trainings.
     * @ManyToMany(targetEntity="Training", inversedBy="Student")
     * @JoinTable(name="student_training",joinColumns={@JoinColumn(name="id_student", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="id_training", referencedColumnName="id")})
     */
    private $trainings;

    public function __construct() {
        $this->trainings = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getTrainings(){
        return $this->trainings;
    }


}