<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'attr' => [
                    'data-validation' => 'required',
                ]
            ])
            ->add('email', 'email', [
                'attr' => [
                    'data-validation' => 'required',
                ]
            ])
            ->add('password', 'password', [
                'attr' => [
                    'data-validation' => 'required',
                ]
            ])
            ->add('alamat', 'text', [
                'attr' => [
                    'data-validation' => 'required',
                ]
            ])
            ->add('no_telp', 'text', [
                'attr' => [
                    'data-validation' => 'required',
                ]
            ])
            ->add('photo', 'file', [
                // 'label' => 'Gambar',
                // 'attr' => ['id' => 'imgInp']
            ]);
    }
}
