<?php


function fetchOldNotifications()
{
    require 'Model/Notifications.php';
    $nots = Notification::getSelfs();
    echo htmlfactory($nots);
}


function fetchNewNotifications(){
    require 'Model/Notifications.php';
    $nots = Notification::getNewSelfs();
    echo htmlfactory($nots);
    updateNots($nots);
}


function deleteNots()
{
    require 'Model/Notifications.php';
    if (Notification::delSelfs()) {
        echo 'good';
    } else {
        echo 'bad';
    }
}


function htmlfactory($nots)
{
    $html = '';
    if($nots!=null){
    foreach ($nots as $item) {
        $html .= '<li>';
        $html .= '<a href="index.php?action=' . $item->getIsItRead() . '">';
        $html .= '<img src="data:image;base64,' . base64_encode($item->getClient()->getImage()) . '" alt="">';
        $html .= '<h3>' . $item->getClient()->getFirstName() . ' ' . $item->getClient()->getLastName() . '</h3>';
        $html .= '<p>You got a ' . $item->getNotifyName() . '</p>';
        $html .= '<p>'.$item->getTime().' '.$item->getDate().'</p>';
        $html .= '</a>';
        $html .= '</li>';
    }
    }
    return $html;
}



function updateNots($nots)
{
    if($nots!=null){
    foreach ($nots as $item) {
        Database::UpdateTosent($item->getIdNotification());
    }
}
}



function getclientsEmails(){
    
}
