<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 10:33 AM
 */

namespace App\Form;


use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
		$builder
			->add('lastName')
			->add('firstName')
			->add('dateOfBirth', DateType::DEFAULT_FORMAT);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		parent::configureOptions($resolver);
		$resolver->setDefaults([
			'data_class' => Person::class,
		]);
	}
}