<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userposts;

use Session;

class HomeController extends Controller
{
    public function getdashboard(){
        $loggedinuser = Session::get('userdata');
        if(!empty($loggedinuser)){
            if(!empty(Session::get('userdata')['userid'])){
                $userid=Session::get('userdata')['userid'];
            }else{
                $userid="";
            }
            $posts = userposts::whereRaw('user_id = "'.$userid.'" and publish_status = 1')->get();
            $posts_result = json_decode(json_encode($posts), true);
            // dd($posts_result);
            return view('dashboard',['posts'=>$posts_result]);
        }else{
            return redirect()->route('login');
        }
    }

    // getposts api
    public function apigetdashboard(Request $request){
        $authtoken = $request->authtoken;
        $currentauthtoken = "aadityadikshit";
        if($authtoken==$currentauthtoken){
            $posts = userposts::whereRaw('publish_status = 1')->get();
            $posts_result = json_encode($posts);
            return $posts_result;
        }else{
            return "Auth Token mismatch";
        }
    }

    public function addpost(){
        $page = "post";
        $loggedinuser = Session::get('userdata');
        if(!empty($loggedinuser)){
            return view('addpost');
        }else{
            return redirect()->route('login');
        }
    }

    public function submitpost(Request $request){
        $validatedData = $request->validate([
            'posttitle' => 'required',
            'postbody' => 'required',
        ]);
        if(!empty(Session::get('userdata')['userid'])){
            $userid=Session::get('userdata')['userid'];
        }else{
            $userid="";
        }
        $user= userposts::create([
            'user_id'=> $userid,
            'post_title'=> $request->posttitle,
            'post_body'=>$request->postbody,
        ]);
        return 1;
    }

    public function deletepost(Request $request){
        $recordremove = $request->removerecord;
        if(!empty(Session::get('userdata')['userid'])){
            $userid=Session::get('userdata')['userid'];
        }else{
            $userid="";
        }
        $postsdelete = userposts::whereRaw('user_id = "'.$userid.'" and id = "'.$recordremove.'"')->update(['publish_status' => 0]);
        $posts_result = json_decode(json_encode($postsdelete), true);
        return 1;
    }

    public function editpost(Request $request){
        $url = url()->full();
        $contentidarr = explode('/',$url);
        $contentid=$contentidarr[4];
        // dd($contentid);
        $type = "edit";
        if(!empty(Session::get('userdata')['userid'])){
            $userid=Session::get('userdata')['userid'];
        }else{
            $userid="";
        }
        if(!empty($contentid)){
            $posts = userposts::whereRaw('id = "'.$contentid.'" and user_id = "'.$userid.'" ')->get();
            $posts_result = json_decode(json_encode($posts), true);
            return view('addpost',['type'=>$type, 'contentid'=>$contentid, 'postdata'=>$posts_result]);
        }
    }

    public function updatepost(Request $request){
        $content_id = $request->editpostbodyid;
        $posttitle = $request->editposttitle;
        $postbody = $request->editpostbody;
        // $validatedData = $request->validate([
        //     'editposttitle' => 'required',
        //     'editpostbody' => 'required',
        // ]);
        if(!empty(Session::get('userdata')['userid'])){
            $userid=Session::get('userdata')['userid'];
        }else{
            $userid="";
        }
        $postedit = userposts::whereRaw('user_id = "'.$userid.'" and id = "'.$content_id.'"')->update(['post_title' => $posttitle, 'post_body'=>$postbody]);
        $postedit_result = json_decode(json_encode($postedit), true);
        // dd($postedit_result);
        return redirect()->route('getdashboard');
        // $user= userposts::create([
        //     'user_id'=> $userid,
        //     'post_title'=> $request->posttitle,
        //     'post_body'=>$request->postbody,
        // ]);
        // return 1;
    }
}
