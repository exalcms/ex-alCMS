<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'label_attr' => ['class' => 'control-label required'],
            ]);
    }
}
