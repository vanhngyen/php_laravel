<?php
function hello(){
    return "hello world !";
}

if(!function_exists("is_admin")){
    function is_admin(){
        if(Auth::check()){
            if(Auth::user()->__get("role") == \App\User::ADMIN_ROLE){
                return true;
            }
        }
        return false;
    }
}


if(!function_exists("format_money")){
    function format_money($money){
        return "$".number_format($money,2);
    }
}

if(!function_exists("notify")){
    function notify($channel,$event,$data){
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '07a4a5c694f23426b0ee',
            '7924ffc823f2c6435875',
            '1020628',
            $options
        );

//        $data['message'] = 'hello world';
        //$pusher->trigger('my-channel', 'my-event', $data);
        $pusher->trigger($channel, $event, $data);
    }

}
