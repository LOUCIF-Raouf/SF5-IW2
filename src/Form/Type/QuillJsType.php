<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuillJsType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                'input_options'  => [],
                'error_bubbling' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_quill_js';
    }

    public function getParent()
    {
        return TextareaType::class;
    }
}