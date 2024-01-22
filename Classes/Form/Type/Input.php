<?php

namespace Form\Type;
use Form\GenericFormElement ;


abstract class Input extends GenericFormElement
{
    public function render(): string
    /**permet de former et de renvoyer un type input d'un formulaire */
    {
        return sprintf(
            '<input type="%s" %s value="%s" name="%s" id="%s"/>', 
            $this->type,
            $this->isRequired() ? 'required="required"' : '',
            $this->getValue(),
            $this->getName(),
            $this->getId()
        );
    }
}

?>