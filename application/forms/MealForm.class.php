<?php

class MealForm extends Form
{
    public function build()
    {
        $this->addFormField('lastName');
        $this->addFormField('description');
        $this->addFormField('photo');
        $this->addFormField('stockInitial');
        $this->addFormField('prixAchat');
        $this->addFormField('PrixVente');
       
    }
}
