<?php


class ExampleTest extends FeatureTestCase
{

    public function test_basic_example()
    {
        $name = 'Hans Acero Hernandez';
        $email = 'zonaacero92@gmail.com';
        $user = factory(\App\User::class)->create([
            'name'=>$name,
            'email'=>$email,
        ]);

        $this->actingAs($user,'api')
             ->visit('api/user')
             ->see($name)
            ->see($email);
    }
}
