<?php 

/**
 * 
 */

class UserForm extends Form
{
    public function build()
    {
        $this->addFormField('LastName');
        $this->addFormField('FirstName');
        $this->addFormField('Address');
        $this->addFormField('City');
        $this->addFormField('ZipCode');
        $this->addFormField('Phone');
        $this->addFormField('Country');
        $this->addFormField('Email');
    }
}


