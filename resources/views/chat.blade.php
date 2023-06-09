<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    #cursor {
        cursor: pointer;
    }
</style>

<body>

    <div class="container-fluid h-mx-100%">
        @if (session()->has('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif


        {{-- <a href="{{ url('registerform') }}" class="btn btn-success float-right m-3 p-3">Register Now</a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary p-3 m-3 float-right">Logout</button>
        </form>
        <div class="messaging ">
            <div class="inbox_msg">
                <div class="inbox_people" name="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                            </div>


                        </div>
                    </div>
                    <div class="inbox_chat scroll">
                        @foreach ($users as $value)
                            {{-- @if ($value->id != auth()->id()) --}}

                            <div class="chat_list active_chat" id="cursor">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil" name="img"> </div>
                                    <div class="chat_ib">


                                        <div class="contact-name"> <a
                                                href="{{ url('chat?userid=' . $value->id) }}">{{ $value->name }}</a>
                                        </div>
                                        <div class="contact-email">{{ $value->email }}</div>
                                        <span class="chat_date float-right">{{ $value->updated_at }}</span>

                                    </div>
                                </div>

                            </div>

                            {{-- @endif --}}
                        @endforeach
                    </div>
                </div>


                <div class="mesgs">

                    @if (!@empty($userid))
                        <div class="msg_history">
                            @if (!empty($messages))
                                @foreach ($messages as $message)
                                    @if ($message->to_id != $userid->id)
                                        <div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img
                                                    src="https://ptetutorials.com/images/user-profile.png"
                                                    alt="sunil"> </div>
                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <div class="message-sender" id="demo">
                                                        {{ $userid->name }}
                                                    </div>
                                                    <div class="message-body">{{ $message->message }}<span
                                                            class="time_date">{{ $message->created_at }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="outgoing_msg">
                                            <div class="sent_msg">
                                                <div class="message-sender">{{ auth()->user()->name }}</div>
                                                <div class="message-body">{{ $message->message }}<span
                                                        class="time_date">
                                                        {{ $message->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    @endif
                                @endforeach
                            @endif

                        </div>
                        <form action="{{url('/save-message')}}" method="post">
                            @csrf
                        <div class="type_msg">
                            <div class="input_msg_write">
 
                                <input type="text" class="write_msg" placeholder="Type a message" name="message" />
                                <button class="msg_send_btn" type="submit" name="submit"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        logout() {
            axios.post('/logout')
                .then(response => {
                    // Handle success, e.g., show a success message
                    // or redirect the user to the login page.
                })
                .catch(error => {
                    // Handle error, e.g., display an error message.
                });
        }
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inbox_chat').click(function() {
                // Perform your desired action here
                // For example, redirect to a URL
                window.location.href = "{{ url('chat?userid=' . $value->id) }}";
            });
        });
    </script>
</body> --}}

</html>
