<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                "label" =>  "article.label.title",
            ])
            ->add('subTitle', TextType::class, [
                "label" => "article.label.sub_title",
            ])
            ->add('keyword', TextType::class, [
                "label" => "article.label.keyword",
            ])
            ->add('content', TextareaType::class, [
                "label" => "article.label.content",
            ])
            ->add('save', SubmitType::class, [
                "label" => "article.label.save",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'translation_domain' => 'forms'
        ]);
    }
}
