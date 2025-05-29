<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Message;
use App\Models\Project;
use App\Models\Admin;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\RecipeDetail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
         return view('admin.index');
        }
        public function dashboard(){
            $recipes = Project::count();
            $user = User::count();
            $msg = Message::whereDay('created_at',now()->day)->count();

            //Register users by month
        $regByMth = User::select(
            DB::raw('DATE_FORMAT(created_at, "%M") as month'),
            DB::raw('COUNT(*) as totals'),
        )

        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();

        $months = $regByMth->pluck('month');
        $mthTotals = $regByMth->pluck('totals');
    //Register users by month end

          //Register users by month
          $postByMth = Project::select(
            DB::raw('DATE_FORMAT(created_at, "%M") as month'),
            DB::raw('COUNT(*) as totals'),
        )

        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->get();

        $postMonths = $postByMth->pluck('month');
        $postTotals = $postByMth->pluck('totals');
    //Register users by month end


            return view('admin.dashboard')->with(['recipes'=>$recipes,'users'=>$user,'messages'=> $msg,
            'months'=>$months,'mthTotals'=>$mthTotals,'postMonths'=>$postMonths,'postTotals'=>$postTotals,
        ]);
           }

           public function adminIndexPost(Request $request)
           {
               $request->validate([
                   'email' => 'required',
                   'password' => 'required',
               ]);

               $admin = Admin::where(['email' => $request->email])->count();
               if ($admin) {
                   $ans = $request->only('email', 'password');
                   if (auth('admin')->attempt($ans)) {
                       return redirect('/admin/dashboard');
                   }
                   return back()->withErrors(['errors' => 'email and password are not match']);
               }
               return back()->withErrors(['errors' => 'Admin`s email isn`t found']);
           }

           public function adminLogout(){
            Auth::forgetUser();
            Session::getHandler()->gc(0);
            return redirect('/admin'); //backslash nae call ma route mr admin paw mal
        }

        public function allRecipes(){
            $countAll = Project::count();
            $blog = Project::get();
            return view('admin.allRecipes',['allBlog'=>$blog,'countRecipes' =>$countAll]);
        }

        public function recipesDetailAdmin($id){

            $rp =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
            ->where('projects.id',$id)
            ->select("projects.*",'recipe_details.*')
            ->get();

            $reviews = Review::join('users',"reviews.user_id","=","users.id")
        ->join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$id)
        ->select('users.*','reviews.review_msg','reviews.id as rid')
        ->get();
        return view('admin.recipesDetailAdmin',['recipes'=>$rp,'reviews'=>$reviews ]);
        }


        public function deleteUserCmt($rid){
            Review::where('id',$rid)
                    ->delete();
            return back()->with(['success' => 'Comment Delete Successful']);
        }
        public function addBlog(){
            return view('admin.addBlog');
        }

        public function addBlogPost(Request $request) {
            $request -> validate([
                'category' => 'required',
                'type_name' => 'required|in:asian food,western food',
                'ingredient'=> 'required',
                'recipe'=> 'required',
                'img_name'=> 'required',
            ],['type_name.required'=>'Type cannot be null.',
            'category.required'=>'Category cannot be null.',
            'ingredient.required'=>'Ingredients cannot be null.',
            'recipe.required'=>'Cooking Method cannot be null.',
            'img_name.required'=>'Image cannot be null.',
        'type_name.in'=>'Type can be only one of asian food or western food.']);

            $projectData = new Project();
            $projectData->category = $request->category;
            if ($request->hasFile('img_name')) {
                $file = $request->file('img_name');
                $fileName ='p' . $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                $projectData->img_name = $fileName;
                // dd(projectData);
            }
            $projectData->save();

            $id =Project::max('id');
            $detailData = new RecipeDetail;
            $detailData->project_id=$id;
            $detailData->ingredient = $request->ingredient;
            $detailData->recipe = $request->recipe;
            $detailData->type_name = $request->type_name;
            $detailData->save();
            return back()->with(['success'=>'Add New Recipe Successful']);
        }

        public function editBlog(){
            $countAll = Project::count();
            $blog = Project::get();
            return view('admin.editBlog',['allBlog'=>$blog,'countRecipes' =>$countAll]);
        }

        public function editPage($id){
            $showRecipes =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
            ->where('projects.id',$id)
            ->select("projects.*",'recipe_details.*')
            ->get();

            return view('admin.editPage',['recipes'=>$showRecipes]);
        }

        public function editBlogPost(Request $request,$id){
            $request -> validate([
                'category' => 'required',
                'type_name' => 'required|in:asian food,western food',
                'ingredient'=> 'required',
                'recipe'=> 'required',
                'img_name'=> 'nullable',
            ],['type_name.required'=>'Type cannot be null.',
            'category.required'=>'Category cannot be null.',
            'ingredient.required'=>'Ingredients cannot be null.',
            'recipe.required'=>'Cooking Method cannot be null.',
            'img_name.required'=>'Image cannot be null.',
        'type_name.in'=>'Type can be only one of asian food or western food.']);

            $data = Project::where('id',$id)->first();
            $data->category = $request->category;
            if ($request->hasFile('img_name')) {
                $file = $request->file('img_name');
                $fileName =  $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                //delete old images codes
                if ($data->img_name) {
                    $oldFilePath = public_path('images/' . $data->img_name);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                $data->img_name = $fileName;
                // dd(datafileName);
            }
            $data->update();

            $detailData = RecipeDetail::where('project_id', $id)->first();
             $detailData->ingredient = $request->ingredient;
             $detailData->recipe = $request->recipe;
             $detailData->type_name = $request->type_name;
             $detailData->update();

            return back()->with(['success'=>'Update Successful']);

        }

        // public function deleteBlog($id){
        //     Project::where('id',$id)
        //             ->delete();
        //     return back()->with(['success' => 'Remove project Successful']);
        // }
        public function allUsers(){
            $users = User::get();
            return view('admin.allUsers',['users'=>$users]);
        }

        public function deleteUser($uid){
            User::where('id',$uid)
                    ->delete();
            return back()->with(['success' => 'Remove user Successful']);
        }
        public function contactMsg(){
            $message = Message::join('users','messages.user_id','=','users.id')
                            ->select('users.email','users.name','messages.*')
                            ->get();
            return view('admin.contactMsg',['messages'=>$message]);
        }

        public function deleteMsg($uid){
            Message::where('id',$uid)
                    ->delete();
            return back()->with(['success' => 'Remove message Successful']);
        }


        public function adminTeam(){
            $admin = Admin::get();
            return view('admin.adminTeam',['admins'=>$admin]);
        }

        public function deleteAdmin($aid){
            $admin = Admin::find($aid);
            if ($admin && $admin->avatar && $admin->avatar !== 'default.jpg') {
                $avatarDel = public_path('imagesAdmin/' . $admin->avatar);
                if (file_exists($avatarDel)) {
                    unlink($avatarDel);
                }
            }
            $admin->delete();

            return back()->with(['success' => 'Remove admin Successful']);
        }

        public function addAdmins(){
            return view('admin.addAdmins');
        }

        public function newAdminPost(Request $request){
            $request -> validate([
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required|confirmed|min:6',
                'role' => 'required',
            ],['password.confirmed'=>'Password and Confirm password are not match']);

            $data['username'] =$request->name;
            $data['email'] =$request->email;
            $data['password'] = $request->password;
            $data['role'] = $request->role;
            $admin = Admin::create($data);
            return back()->with(['success'=>'Account creation successful']);
        }
        public function setting(){
            $admin = Admin::where('id',auth('admin')->user()->id)->get();
            return view('admin.setting',['admins'=>$admin]);
        }

        public function editProfilePost(Request $request){
            $request->validate([
                'username' => 'required',
                'avatar'=> 'nullable',
            ], ['username.required' => 'Username cannot be null']);

            $adminData = Admin::where('id', auth('admin')->user()->id)->first();
            $adminData->username = $request->username;

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //make unique name
                $file->move(public_path('imagesAdmin'), $fileName);
                if ($adminData->avatar && $adminData->avatar != 'default.jpg') {
                    $oldFilePath = public_path('imagesAdmin/' . $adminData->avatar);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $adminData->avatar = $fileName;
            }

            $adminData->update();

            return back()->with(['success' => 'Profile updated successful.']);

        }

        public function changeAdminPwd(){
            return view('admin.ChangePwd');
        }

        public function changeAdminPwdPost(Request $request){
            $request -> validate([
                'password' => 'required|confirmed|min:6',
            ],['password.confirmed'=>'Password and Confirm password are not match']);

            $adminData = Admin::where('id',auth('admin')->user()->id)->first();
            $adminData['password'] = $request->password;
            $adminData->update();

            return redirect('/admin')->with(['success'=>'Password successfully changed.']);
        }
        public function searchAdmin(Request $request){
            $request ->validate([
                'search'=> 'required',
            ]);
            $srh = Project::where('category','LIKE','%'.$request -> search.'%')->paginate(3);
            if($srh)
            return view('admin.searchAdmin',['adminSearch'=>$srh]);
        }
}
