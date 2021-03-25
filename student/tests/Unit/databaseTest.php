<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefershDatabase;
use App\Models\User;

class databaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
         //$response=$this->get('/');
         //$response->assertStatus(200);
         //$this->assertTrue(true);
        $this->assertDatabaseHas('student',[
            'firstname'=>'s',
            'lastname'=>'a',
            'id'=>7,
            
           // dd("This email id is wrong")
        ]);
       // $response = $this->get('/login');
        //dd($response);

       //$response->assertSuccessful();
       //dd($response);
     //}


    // public function main_page_contains_contact_form_liveware_component(){
    //     $this->get('/')
    //        -> assertSeeLivewire('login');
    }
}
