<?php

/* ~functionclass.helper.php
 * 
 * @verson : 1.0
 * @contact : via mickesweb.se
 * @author :  Mikael Andersson <mikael@mickesweb.se>
 * @copyright (c) 2012, Mikael Andersson. All Rights Reserved.  
 * @license : http://creativecommons.org/licenses/by-nc-sa/3.0/
 * 
 * Last Updated: 2012-02-04
 * INFO: A class with useful functions.
 * NOTE: Requires PHP version 5 or later.
 */

class Helper {
    
    /* Makes a string clean of strange characters. Made to be used in the url.
     * Input:
     *      @param string $string
     * 
     * @return string
     */
    public function cleanString($string) {
        $cleanString = filter_var(strip_tags(strtolower(trim($string))), FILTER_SANITIZE_STRING);
        $cleanString = str_replace(' ', '_', $cleanString);
        $cleanString = str_replace('å', 'a', $cleanString);
        $cleanString = str_replace('ä', 'a', $cleanString);
        $cleanString = str_replace('ö', 'o', $cleanString);
        $cleanString = str_replace('è', 'e', $cleanString);
        $cleanString = str_replace('à', 'a', $cleanString);

        return $cleanString;
    }
    
    /* Randomly a word, the function can be used as password generator.
     * Input:
     *      @param int $numberOfLetters
     *      @param Enum $lettersType (low, upper, figures, character, lowFig, uppFig, all)
     * 
     * @return string
     */
    public function randomize($numberOfLetters=6, $lettersType='low') {
        $lowercase = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $uppercase = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $figures = array("1", "2", "3", "4", "5", "6", "7", "8", "9");
        $character = array("!", "?", "@", "$", "&", "*", "#");
        // Builds up the array of characters.
        switch (strtolower($lettersType)) {
            case "low" :
                $array = array_merge($lowercase);
                break;
            case "upper" :
                $array = array_merge($uppercase);
                break;
            case "figures" :
                $array = array_merge($figures);
                break;
            case "character" :
                $array = array_merge($character);
                break;
            case "lowfig" :
                $array = array_merge($lowercase, $figures);
                break;
            case "uppfig" :
                $array = array_merge($uppercase, $figures);
                break;
            case "all" :
            default:
                $array = array_merge($lowercase, $uppercase, $figures, $character);
                break;
        }
        // Random right number of letters and fixed the "string".
        $string = "";
        $count = count($array) - 1;
        for ($i = 0; $i < $numberOfLetters; $i++) {
            $random = rand(0, $count);
            $string .= $array[$random];
        }
        
        return $string;
    }
}
?>