<?php
namespace Application\Form;
use Zend\Form\Form;


class TrainingForm extends Form
{
    // Constructor.
    public function __construct()
    {
        // Define form name
        parent::__construct('training-form');

        // Set POST method for this form
        $this->setAttribute('method', 'post');

        // (Optionally) set action for this form
        $this->setAttribute('action', '/add-training');

        // Create the form fields here ...

        $this->addTrainings();
    }

    // This method adds elements to form (input fields and
    // submit button).
    private function addTrainings()
    {
        // Add "Title" field
        $this->add([
            'type'  => 'Text',
            'name' => 'title',
            'attributes' => [
                'id' => 'title'
            ],
            'options' => [
                'label' => 'Title',
            ],
        ]);

        // Add "Start at" field
        $this->add([
            'type'  => 'Date',
            'name' => 'start_date',
            'attributes' => [
                'id' => 'startdate'
            ],
            'options' => [
                'label' => 'Start Date',
            ],
        ]);

        // Add "Finish at" field
        $this->add([
            'type'  => 'Date',
            'name' => 'end_date',
            'attributes' => [
                'id' => 'enddate'
            ],
            'options' => [
                'label' => 'Finish at',
            ],
        ]);

        $this->add([
            'type'  => 'Text',
            'name' => 'students_nbr',
            'attributes' => [
                'id' => 'students'
            ],
            'options' => [
                'label' => 'Students Number',
            ],
        ]);

        $this->add([
            'type'  => 'Textarea',
            'name' => 'description',
            'attributes' => [
                'id' => 'discription'
            ],
            'options' => [
                'label' => 'Description',
            ],
        ]);


        // Add the submit button
        $this->add([
            'type'  => 'Submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);
    }
}