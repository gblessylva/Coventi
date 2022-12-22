<?php




function add_user_payment($ticked_id, $ticket_info = array()){
    $user_id = get_current_user_id();

    $tickets = get_posts(array('post_type' => 'coventi_tickets'));

    var_dump($tickets);

}

