<?php

namespace App;

use App\App;

class Tracker
{
    public function startTrack()
    {
        $tracker_entry['user'] = $this->getUser();
        $tracker_entry['time'] = $this->getTime();
        $tracker_entry['link'] = $this->getPageLink();
        App::$db->insertRow('tracker_table', $tracker_entry);
    }

    private function getUser(): string
    {
        if (App::$session->getUser()) {
            return App::$session->getUser()['email'];
        }

        return session_id();
    }

    private function getTime(): string
    {
        return date("y.m.d, H:i:s");
    }

    private function getPageLink(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function clearHistory(string $user_email = null): bool
    {
        return $user_email ?
            App::$db->deleteRows('tracker_table', ['user' => $user_email]) :
            App::$db->truncateTable('tracker_table');
    }

    public function getUserHistory(string $user_email): ?array
    {
        return App::$db->getRowsWhere('tracker_table', ['email' => $user_email]);
    }

    public function updateAnonUser(string $user_email){
        
        foreach(App::$db->getData()['tracker_table'] as $row_index => $row) {
            if($row['user'] === session_id()){
                $row['user'] = $user_email;
                App::$db->updateRow('tracker_table', $row_index, $row);
            }
        }
    }
}
