<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\Sendmessage;
use Illuminate\Http\Request;
use App\Models\User;

class Chatcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $users = User::all();
        $users = User::whereNotIn('id', [auth()->user()->id])->get();
       
        if (isset($_GET['userid'])) {
            $id = $_GET['userid'];
            session()->put('uid', auth()->user()->id);
            session()->put('name', auth()->user()->name);
            $userid = User::find($id);
            $adnan = $userid->name;
            session()->put('name', $adnan);
            $messages = Sendmessage::where('from_id', auth()->user()->id)
                ->where('to_id', $id)
                ->orWhere('from_id', $id)
                ->where('to_id', auth()->user()->id)
                ->get();
            session()->put('userid', $id);

            return view('chat', compact('users', 'userid', 'messages'));
        }

        return view('chat', compact('users'));
    }
    public function saveMessage(Request $request)
    {
        $userid = session()->get('userid');
        $name = session()->get('name');
        $uid = session()->get('uid');
        // echo $umair=$request->userid;

        $chat = new Sendmessage();
        $chat->to_id = $userid;
        $chat->from_id = $uid;
        $chat->message = $request->message;
        $chat->save();
        return redirect()->back();
    }

    public function viewMessage()
    {
        $users = Sendmessage::where('name', session()->has('name'))->get();
        // $sendmessage = Sendmessage::all();
    }


















    // public function savemessage(Request $request)
    // {
    //     // Assuming the authenticated user is creating the post
    //     $userId = auth()->id();

    //     $data = $request->only(['ffrom_id', 'message']);

    //     $Sender = new Sender();
    //     $Sender->title = $data['from_id'];
    //     $Sender->content = $data['message'];
    //     $Sender->user_id = $userId; // Set the foreign key value

    //     $Sender->save();

    //     // Further processing or redirection
    // }
    //     public function startChat($userId)
    // {
    //     // Get the authenticated user's ID
    //     $authUserId = auth()->id();

    //     // Check if the chat session already exists between the users
    //     $chatSession = User::where(function ($query) use ($authUserId, $userId) {
    //         $query->where('to_id', $authUserId)->where('from_id', $userId);
    //     })
    //     ->orWhere(function ($query) use ($authUserId, $userId) {
    //         $query->where('to_id', $userId)->where('from_id', $authUserId);
    //     })
    //     ->first();

    //     // If the chat session doesn't exist, create a new one
    //     if (!$chatSession) {
    //         $chatSession = new User();
    //         $chatSession->to_id = $authUserId;
    //         $chatSession->from_id = $userId;
    //         $chatSession->save();
    //     }

    //     // Fetch the chat messages, user information, or any other relevant data
    //     // You can customize this part based on your specific requirements

    //     // Fetch the chat messages, excluding the logged-in user
    //     $chatMessages =Sendmessage::where('chat_session_id', $chatSession->id)
    //         ->where('user_id', '!=', $authUserId)
    //         ->get();

    //     return view('chat', [
    //         'chatSession' => $chatSession,
    //         'user' => User::find($userId),
    //         'chatMessages' => $chatMessages,
    //     ]);
    // }
}
