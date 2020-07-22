<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('posts', EntityType::class, [
                // looks for choices from this entity
                'class' => Post::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => function(Post $post) {
                    return $post->getTitle().' '.$post->getPublishDate()->format('d/m/Y');
                },
            
                // used to render a select box, check boxes or radios
                'multiple' => true, // true car dans une relation oneToMany
                // 'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
