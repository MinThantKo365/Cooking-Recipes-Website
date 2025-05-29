<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Message;
use App\Models\Project;
use App\Models\RecipeDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{


    public function newBlog(){
        $blog = Project::latest()->limit(6)->get();
        $random = Project::inRandomOrder()->limit(6)->get();;
         return view('project.home',['newblogs'=>$blog,'randomBlogs'=>$random]);
        }

    public function showRecipes(){
            $recipes = Project::paginate(9);
            return view('project.recipes',['recipes'=>$recipes]);
    }


    public function asianFood(){
      $asianFood =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
                ->where('recipe_details.type_name','=','asian food ')
                ->get();

        return view('project.asianfood',['asianFood'=> $asianFood]);
    }

    public function westernFood(){
        $westernFood =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
                ->where('recipe_details.type_name','=','western food ')
                ->get();

        return view('project.westfood',['westernFood'=> $westernFood]);
    }

    public function bookmarks(){
        if(session()->get('user')){
            $user_id= session()->get('user')->id;
                 $db  = DB::table('bookmarks')
                   -> join('projects','bookmarks.project_id','=','projects.id')
                   -> where('bookmarks.user_id',$user_id)
                   -> select('projects.*','bookmarks.id as bookmarks')
                   -> paginate(4);

           return view('project.bookmarks',['bookmarks'=>$db]);
       }
       return back();

    }

    public function addBookmarks($id){
        if(session()->get('user')){
            $bmExists = Bookmark::where('user_id', session()->get('user')->id)
                                ->where('project_id',$id)
                                ->exists();

    if ($bmExists) {
        return back()->withErrors('This project is already in bookmarks.');
    }
    $data['user_id'] =session()->get('user')->id;
    $data['project_id']=$id;
    $createBm = Bookmark::create($data);
    if($createBm){
        return back()->with(['success'=>'Added to bookmarks successfully.']);
    }
        }
        else{
            return redirect('/LMC/login');
        }
    }

    public function bookRemove($id){
        Bookmark::destroy($id);
        return redirect('/LMC/bookmarks')->withErrors(['errors'=>'Remove Successful']);
    }

    public function search(Request $request){
        $request ->validate([
            'search'=> 'required',

        ]);
        $srh = Project::where('category','LIKE','%'.$request -> search.'%')->paginate(3);
        if($srh)
        return view('project.search',['userSearch'=>$srh]);
    }

    public function showDetail($id){
        $blog = Project::latest()->limit(3)->get();
        if(session()->get('user')){
        $rp =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
        ->where('projects.id',$id)
        ->select("projects.*",'recipe_details.*')
        ->get();

        $reviews = Review::join('users',"reviews.user_id","=","users.id")
        ->join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$id)
        ->select('users.name','reviews.*')
        ->latest()
        ->limit(4)
        ->get();


    //     $dt = RecipeDetail::where('project_id',$id)->get();
    return view('project.recipedetail',['recipes'=>$rp,'newblogs'=>$blog,'reviews'=>$reviews]);
        }
        else{
            return redirect('/LMC/login')->withErrors(['errors'=>'You should login first to see the recipe.']);
        }
    }

    public function afDetail($id){
        if(session()->get('user')){
            $blog = Project::latest()->limit(3)->get();
        $rp =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
                ->where('projects.id',$id)
                // ->where('recipe_details.id',$id)
                ->where('recipe_details.type_name','=','asian food')
                ->select("projects.*",'recipe_details.*')
                ->get();

                $reviews = Review::join('users',"reviews.user_id","=","users.id")
        ->join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$id)
        ->select('users.*','reviews.review_msg')
        ->limit(4)
        ->get();
        return view('project.recipedetail',['recipes'=>$rp,'newblogs'=>$blog,'reviews'=>$reviews]);
            }
        else{
            return redirect('/LMC/login')->withErrors(['errors'=>'You should login first to see the recipe.']);
        }
    }

    public function wfDetail($id){
        $blog = Project::latest()->limit(3)->get();
        if(session()->get('user')){
        $rp =  Project::join('recipe_details','projects.id','=','recipe_details.project_id')
                ->where('projects.id',$id)
                // ->where('recipe_details.id',$id)
                ->where('recipe_details.type_name','=','western food')
                ->select("projects.*",'recipe_details.*')
                ->get();

        $reviews = Review::join('users',"reviews.user_id","=","users.id")
        ->join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$id)
        ->select('users.*','reviews.review_msg')
        ->limit(4)
        ->get();

     return view('project.recipedetail',['recipes'=>$rp,'newblogs'=>$blog,'reviews'=>$reviews]);
            }
    else{
        return redirect('/LMC/login')->withErrors(['errors'=>'You should login first to see the recipe.']);
    }
    }


}
