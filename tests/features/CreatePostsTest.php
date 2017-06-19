<?php
/**
 * Created by PhpStorm.
 * User: hans-acero
 * Date: 18/06/17
 * Time: 04:50 PM
 */

//namespace tests\features;


class CreatePostsTest extends FeatureTestCase
{
    public function test_a_user_create_a_post(){

        $title='esta es una pregunta';

        //having
        $this->actingAs($this->defaultUser());


        //when
        $this->visit(route('posts.create'))
            ->type($title,'title')
            ->type('este es el contenido','content')
            ->press('Publicar');


        $this->seeIndatabase('posts',[
            'title'=>$title,
            'content'=>'este es el contenido',
            'pending'=>true,
        ]);

        $this->seeInElement('h1',$title);

    }

}