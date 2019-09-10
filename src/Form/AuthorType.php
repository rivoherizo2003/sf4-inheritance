<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 10:08 AM
 */

namespace App\Form;


use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
		$builder
			->add('firstName')
			->add('lastName')
			->add('dateOfBirth')
			->add('famousName')
			->add('website');
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		parent::configureOptions($resolver);
		$resolver->setDefaults([
			'data_class' => Author::class
		]);
	}
}