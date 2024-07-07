<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Chat::where('show_mesage', 1)->orderBy('id', 'asc')->get();
        return view('chat.chat', [
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getMessages()
    {
        $messages = Chat::orderBy('created_at', 'asc')->where('show_mesage', 1)->get();
        return response()->json(['messages' => $messages]);
    }

    public function send(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:mp3,wav,ogg|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $sendMesage = new Chat([
            'user_id' => $id,
            'mesage' => $request->mesage,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->image->store('UserFile/mesage/' . $id . '/image');
            $sendMesage->image = $imagePath;
        }

        if ($request->hasFile('audio') && $request->file('audio')->isValid()) {
            $audioPath = $request->audio->store('UserFile/mesage/' . $id . '/audio');
            $sendMesage->audio = $audioPath;
        }

        $sendMesage->save();

        return response()->json(['message' => $sendMesage]);
    }

    public function hideMessages(){
        $hideAll = Chat::all();
        foreach ($hideAll as $chat) {
            $chat->show_mesage = 0;
            $chat->save();
        }

        return redirect()->route('chat.index');
    }

}
