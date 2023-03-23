<?php

function save_contact(){
    $str = $_POST['name'].'|'.$_POST['surname'].'|'.$_POST['phonenumber'].'|'.$_POST['comment'].'|'.date('Y-m-d H:i:s'). "\n***\n";
    file_put_contents('phonebook.txt', $str, FILE_APPEND);
}


function get_contact(){
    return file_get_contents('phonebook.txt');
}

function array_contacts($contacts){
    $contacts = explode("\n***\n", $contacts);
    array_pop($contacts);
    $contacts  = array_reverse($contacts);
    $contacts  = array_contact($contacts);
    return $contacts;
}

function array_contact($contacts){
    $arrayContact = [];
    $i = 0;
    foreach($contacts as $contact){
        $contact = explode('|', $contact);
        $arrayContact[$i] = $contact;
        $i++;
    }
    return $arrayContact;
}