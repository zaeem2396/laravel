<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        $chkAuth = DB::table("users")->where([
            ["email", "=", $email],
            ["password", "=", $password]
        ])->get()->toArray();
        if (count($chkAuth) > 0) {
            echo json_encode(["status" => 200]);
            $request->session()->put('user_id', $chkAuth[0]->id);
            $user_id = $request->Session()->get("user_id");
        } else {
            echo json_encode(["status" => 500]);
        }
    }

    public function dashboard(Request $request)
    {
        $user_id = $request->session()->get("user_id");
        ($user_id == "") ? redirect('/') : "";
        $data['title'] = "Dashboard";
        $data['agents'] = DB::table("agents")->select('*')->get()->toArray();
        $data['totalAgents'] = DB::table("agents")->count();
        return view("dashboard", $data);
    }

    public function disableAgent(Request $request)
    {
        $id = $request->input("id");
        if (DB::table("agents")->where("AGENT_CODE", $id)->update(["STATUS" => 0])) {
            echo json_encode(["status" => 200]);
        } else {
            echo json_encode(["status" => 500]);
        }
    }

    public function enableAgent(Request $request)
    {
        $id = $request->input("id");
        if (DB::table("agents")->where("AGENT_CODE", $id)->update(["STATUS" => 1])) {
            echo json_encode(["status" => 200]);
        } else {
            echo json_encode(["status" => 500]);
        }
    }

    public function agent_list()
    {
        $data['title'] = "Agent List";
        $data['agents'] = DB::table("agents")->select('*')->get()->toArray();
        return view('agent_list', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
