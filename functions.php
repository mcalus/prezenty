<?php

// Get JSON from a file DB
function getDBFile($name) {
    // Checking if file exits, if not then create empty one
    if(!file_exists("db/". $name .".json")) {
        $fp = fopen("db/". $name .".json", 'w');
        fclose($fp);
    }

    // Getting data from file from text to JSON
    $data = json_decode(file_get_contents("db/". $name .".json"), true);
    if(!$data)
        $data = array();

    return $data;
}


// Draw for picker one random person from the list
function draw($picker, $draw_from, $list_drawn, $spouse = false) {
    $choosen = array();
    
    // Check if person which is choosing already exist on the list
    if($picker !== false && isset($draw_from[$picker])) {
        // Exclude yourself and all drawn
        // print_r(array_merge($list_drawn, array($picker => array())));
        // print_r($list_drawn);
        // print_r($draw_from);
        // $list_draw = array_diff($draw_from, array_merge($list_drawn, array($picker => null)));
        // print_r($list_draw);
        
        // Exclude yourself
        unset($draw_from[$picker]);
        // Exclude all choosen ones
        foreach($list_drawn as $drawn) {
            if(isset($draw_from[$drawn['picked']])) {
                unset($draw_from[$drawn['picked']]);
            }
         }

        // Make sure that you will not stay with option to choose only yourself
        // Cases:
        // - Both persons have drawn person
        // - Both persons don't have drawn person
        // - When only one person don't have drawn another then actual pick need to be forced on that person
        // if(count($draw_from) == 2 && in_array($picker, $list_drawn)) {
        if(count($draw_from) == 2 && array_search($picker, array_column($list_drawn, 'picked')) !== false) {
            $check = array();
            // Get both persons to draw
            foreach($draw_from as $id=>$person) {
                // Check if person have already drawn another person
                if(isset($list_drawn[$id])) {
                    $check[] = $id;
                }
            }
            // Delete person from draw which have already drawn somebody else
            if(count($check) == 1) {
                unset($draw_from[$check[0]]);
            }
        }
        // *Optionally also excluding spouses if we have somebody else to draw
        elseif($config['spouses'] && $spouse && count($draw_from) > 1) {
            unset($draw_from[$spouse]);
        }

        // If there is anything to choose do it!
        if(!isset($draw_from[$picker]) && count($draw_from) > 0) { 
            // $choosen[$picker] = ['picked'=>array_rand($draw_from), 'timestamp'=>date('Y-m-d H:i:s')];
            $choosen = ['picked'=>array_rand($draw_from), 'timestamp'=>date('Y-m-d H:i:s')];
        }
        else {
            $_SESSION['message'] = 'Błąd losowania!';
        }
    }

    return $choosen;
}