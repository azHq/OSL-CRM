@component('components.breadcrumb')
@slot('title') Chat with Counsellor @endslot
@slot('li_1') Dashboard @endslot
@slot('li_2') Appointments @endslot
@slot('li_3') <i class="feather-user" aria-hidden="true"></i> @endslot
@endcomponent
<?php

use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

$messages = Messages::where([
    ['message_to', '=', $user->id],
    ['message_by', '=', Auth::id()],
])->orWhere([
    ['message_to', '=', Auth::id()],
    ['message_by', '=', $user->id],
])->get();


?>
<!-- Page Header -->
<div id="container">
    <main>
        <header>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
            <div>
                <h2>Chat with {{$user->name}}</h2>
                <h3>Counsellor</h3>
            </div>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
        </header>
        <ul id="chat">
            @foreach($messages as $message)
            @if(Auth::id() == $message->message_by)
            <li class="me">
                <div class="entete">
                    <h3>{{$message->created_at}}</h3>
                    <h2>{{Auth::user()->name}}</h2>
                    <span class="status_chat blue"></span>
                </div>
                <div class="message">
                    {{$message->message}}
                </div>
            </li>

            @else
            <li class="you">
                <div class="entete">
                    <span class="status_chat green"></span>
                    <h2>{{$user->name}}</h2>
                    <h3>{{$message->created_at}}</h3>
                </div>

                <div class="message">
                    {{$message->message}}
                </div>
            </li>
            @endif
            @endforeach



        </ul>
        <footer>
            <form action="{{ route('message.send') }}" method="POST">
                @csrf
                <input hidden name='id' value="{{$user->id}}">
                <textarea placeholder="Type your message" name="message" class="form-control" type="text"></textarea>
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
                <button type="submit">Send</button>
            </form>

        </footer>
    </main>
</div>
<script>
    $(document).ready(function() {
        let scroller = document.querySelector("#chat");
        const targetNode = document.getElementById("chat");

        const config = {
            childList: true
        };

        const callback = function(mutationsList, observer) {
            for (let mutation of mutationsList) {
                if (mutation.type === "childList") {
                    window.scrollTo(0, document.body.scrollHeight);
                }
            }
        };

        const observer = new MutationObserver(callback);
        observer.observe(targetNode, config);
    });
</script>