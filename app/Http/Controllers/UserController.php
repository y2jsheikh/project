<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UsersProject;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "User";
        return view('adminpanel.user.user')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = "Add User";
        $data['role_select'] = get_role();
        $data['multiple_project_select'] = get_multiple_project();
        return view('adminpanel.user.add_user', $data)->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){
        $userId = Auth::id();
        $insertData = $request->all();
        /*
        $insertData['created_by'] = $userId;
        $insertData['updated_by'] = $userId;
        $insertData['password'] = bcrypt($insertData['password']);
        User::create($insertData);
        */

        $user = new User();

        $user->name = $insertData['name'];
        $user->username = $insertData['username'];
        $user->role_id = $insertData['role_id'];
        $user->role = $insertData['role'];
        $user->email = $insertData['email'];
        $user->password = bcrypt($insertData['password']);
        $user->created_by = $userId;
        $user->updated_by = $userId;
        $user->save();
        $id = $user->id;

        if (!empty($insertData['project_id']) && count($insertData['project_id']) > 0){
            foreach ($insertData['project_id'] as $rec){
                $users_project = new UsersProject();
                $users_project->user_id = $id;
                $users_project->project_id = $rec;
                $users_project->save();
            }
        }

        return redirect('user')->with('success', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::findOrFail($id);
        $title = "Edit User";
        $data['user'] = $user;
        $data['role_select'] = get_role($user->role_id);
        $project = getUserProjects($id);
//        pre($project ,1);
        $data['multiple_project_select'] = get_multiple_project($project);
        return view('adminpanel.user.edit_user', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function update(UserRequest $request, $id){
        $userId = Auth::id();
        $user = User::findOrFail($id);
        $updateData = $request->all();
        $updateData['updated_by'] = $userId;
        if (!empty($updateData['password'])) {
            $updateData['password'] = bcrypt($updateData['password']);
        }
        $user->update($updateData);
        return redirect('user')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user')->with('success', 'User Successfully Deleted');
    }
}
