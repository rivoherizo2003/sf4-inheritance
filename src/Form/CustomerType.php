<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/19
 * Time: 10:08 AM
 */

namespace App\Form;


use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
		$builder
			->add('criticAuthor')
			->add('preferredBook');
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		parent::configureOptions($resolver);
		$resolver->setDefaults([
			'data_class' => Customer::class
		]);
	}
}