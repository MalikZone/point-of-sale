<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\userRepository;

class userController extends Controller
{
    public function __construct(userRepository $user){
		$this->user   = $user;
	}

    public function index() {
        $users = $this->user->getUser();
        return view('user.index', compact('users'));       
    }

    public function store(Request $request) {
        $user = $this->user->saveUser($request->all());
        $request->session()->flash('pesan', "Data berhasil disimpan");
        return redirect()->back();
    }

    public function delete($id){
        $this->user->deleteUser($id);
        return redirect()->back();
    }
}
