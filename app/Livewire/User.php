<?php

namespace App\Livewire;

use session;
use Livewire\Component;
use App\Models\User as Users;
use Illuminate\Support\Facades\Hash;

class User extends Component
{

    
        public $name, $email, $password;
        public $datatampilan;

        protected $rules = [
            'name' =>'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];

    public function store()
    {
        $this->validate();



        Users::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
           
        ]);

        $this->reset();

        session()->flash('message', 'User berhasil dibuat!');
    }


   

public function edit($id)
    {
        $render = Users::findOrFail($id);

        if($render) {
            $this->name = $render->name;
            $this->email = $render->email;
            $this->password = $render->password;
        }

       

    }

public function update()
    {
        $this->validate();

        if($this->id) {

            $render= Users::find($this->id);
            
            if($render) {
                $render->update([
                    'name'     => $this->title,
                    'email'   => $this->email,
                    'password'   => $this->password
                ]);
            }
        }

         //flash message
         session()->flash('message', 'Data Berhasil Diupdate.');

         //redirect
         return redirect()->route('post.index');

    }

       
    


 

    public function render()
    {
        $this->datatampilan = Users::all();
        return view('livewire.user');
    }


    public function destroy($id)
    {
        Users::find($id)->delete();
    }


}
