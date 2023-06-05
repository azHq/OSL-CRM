<?php

namespace App\Http\Controllers;

use App\Events\TaskAssignedEvent;
use App\Models\Lead;
use App\Models\Messages;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function list($message_by)
    {
        if (\request()->ajax()) {
            $messages = Messages::where([
                ['message_to', '=', $message_by],
                ['message_by', '=', Auth::id()],
            ])->orWhere([
                ['message_to', '=', Auth::id()],
                ['message_by', '=', $message_by],
            ])->get();

            return $messages;
        }
    }

    public function chatView($id, Request $request)
    {
        if (\request()->ajax()) {
            $user = User::find($id);

            $message = Messages::where([
                ['message_to', '=', $id],
                ['message_by', '=', Auth::id()],
            ])->orWhere([
                ['message_to', '=', Auth::id()],
                ['message_by', '=', $id],
            ])->orderBy('created_at', 'desc')->first();
            if ($message->message_to == Auth::id()) {
                Messages::where('id', $message->id)->update(['is_seen' => 1]);
            }
            return view('chat.index', compact('user'));
        }
        return view('layout.mainlayout');
    }

    public function messageSend(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
        try {
            $message['message'] = $request->message;
            $message['message_by'] = Auth::id();
            $message['message_to'] = $request->id;
            $message['type'] = 'text';
            Messages::create($message);
            return Redirect::back()->with('success', 'Message sent successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
