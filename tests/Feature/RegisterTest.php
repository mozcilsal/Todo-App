<?php

namespace Tests\Feature;


use Illuminate\Support\Str;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Note;
use App\Models\userModel;

class RegisterTest extends TestCase
{
    /** @test  */
    public function a_user_can_get_register(): void
    {
        $response = $this->get('/register-show');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_user_can_post_register(): void
    {
        $response = $this->post('/register-save', [
            'username' =>  Str::random(4),
            'password' => Str::random(4),
        ]);
       
        $response->assertStatus(302);
        $response->assertRedirect('/');

       
    

    }
    /** @test  */
        public function can_user_add_notes(): void
        {
            $response=$this->post('/added',[
                'notname' => Str::random(4),
                'notdurum'=> Str::random(4),
                'noticerik'=> Str::random(4),
            ]);
            $response->assertStatus(302);
            $response->assertRedirect('/main');


        }
       /** @test  */
         public function can_user_see_edit():void
         {  
            $lastnote=Note::orderBy('id','desc')->first();
            $noteid=$lastnote->id;


            $response=$this->get('/edit/'.$noteid);
            $response->assertStatus(200); 

             }
     /** @test  */
        public function can_user_edit_note():void{
            $lastnote=Note::orderBy('id','desc')->first();
            $noteid=$lastnote->id;

            $response=$this->patch('/update/'.$noteid,[
                'notname'=> Str::random(4),
                'notdurum'=> Str::random(4),
                'noticerik'=> Str::random(4),
            ]);
            $response->assertStatus(302);
            $response->assertRedirect('/main');
            


        }
         /** @test  */
         public function can_user_delete_note():void{
            $lastnote=Note::orderBy('id','desc')->first();
            $noteid=$lastnote->id;
            

            $response =$this->post('/deleted/'.$noteid);
                
            $response->assertStatus(302);
            $response->assertRedirect('/main');
            


         }
         /** @test  */
         public function can_user_see_note():void{
            $lastnote=Note::orderBy('id','desc')->first();
            $noteid=$lastnote->id;
                $response =$this->post('/not/'.$noteid);
                $response->assertStatus (200);
                
            
                
            
         }


        

        



       }

        
        
        


    



    
    
