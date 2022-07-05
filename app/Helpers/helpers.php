<?php 

if (! function_exists('events')) {
    function events($option)
    {
        $events = ['created' => 'cadastrou', 'updated' => 'atualizou', 'deleted' => 'excluiu'];
        return $events[$option];
    }
}