<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use DB;
use Cloudinary;

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

    public function getAgentData()
    {
        $agents = DB::table("agents")->select('*')->get()->toArray();
        $data = [];
        foreach ($agents as $key => $val) {
            $color = $val->STATUS == '1' ? 'danger' : 'success';
            $btnname = $val->STATUS == '1' ? 'Deactivate' : 'Activate';
            $value = $val->STATUS == '1' ? '0' : '1';
            $val->btn = '<button type="button" onclick="updateAgentStatus(this)" id="btn-' . $val->AGENT_CODE . '" data-id="' . $val->AGENT_CODE . '" data-value="' . $value . '" class="btn btn-sm btn-' . $color . '">' . $btnname . ' </button>';

            $data[] = [
                $key + 1,
                $val->AGENT_CODE,
                $val->AGENT_NAME,
                $val->WORKING_AREA,
                $val->COMMISSION,
                $val->PHONE_NO,
                $val->STATUS == 1 ? '<span id="span-' . $val->AGENT_CODE . '" class="badge badge-success">Active</span>' : '<span id="span-' . $val->AGENT_CODE . '" class="badge badge-danger">Deactivated</span>',
                $val->btn
            ];
        }
        $result = array(
            "recordsTotal" => count($agents),
            "data" => $data
        );
        echo json_encode($result);
        exit;
    }

    public function updateAgentStatus(Request $request)
    {
        $id = $request->input("id");
        $status = $request->input("status");
        if (DB::table('agents')->where('AGENT_CODE', $id)->update(['STATUS' => $status])) {
            echo json_encode(["status" => 200]);
        } else {
            echo json_decode(["status" => 500]);
         }
    }

    public function agent_list()
    {
        $data['title'] = "Agent List";
        $data['agents'] = DB::table("agents")->select('*')->get()->toArray();
        return view('agent_list', $data);
    }

    public function uploadFile(Request $request)
    {
        $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
        var_dump($uploadedFileUrl);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
