<?php


class Barcode {

	function draw($text, $type = 'Code39', $imgtype = 'png') {
	
	
        $classname = "Image_Barcode_${type}";

        if (!class_exists($classname)) {
            print "ERROR No CLASS";
        }

        if (!in_array('draw',get_class_methods($classname))) {
           print ("Unable to find create method in '$classname' class");
        }

        @$obj =& new $classname;

        $obj->draw($text, $imgtype);
        
        
    }
	
	
	
}





/**
 * Image_Barcode_code128 class
 *
 * Renders Code128 barcodes
 * Code128 is a high density encoding for alphanumeric strings.
 * This module prints the Code128B representation of the most common
 * ASCII characters (32 to 134).
 *
 * These are the components of a Code128 Bar code:
 * - 10 Unit Quiet Zone
 * - 6 Unit Start Character
 * - (n * 6) Unit Message
 * - 6 Unit "Check Digit" Character
 * - 7 Unit Stop Character
 * - 10 Unit Quiet Zone
 *
 * I originally wrote this algorithm in Visual Basic 6 for a Rapid 
 * Software Development class, where we printed Code128 B bar codes
 * to read using Cue Cat bar code readers.  I rewrote the algorithm
 * using PHP for inclusion in the PEAR Image_Barcode project.
 *
 * The Code128B bar codes produced by the algorithm have been validated
 * using my trusty Cue-Cat bar code reader.
 *
 * PHP versions 4
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Jeffrey K. Brown <jkb@darkfantastic.net>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: code128.php,v 1.1 2005/05/30 04:32:06 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */


class Barcode_code128 extends Barcode {
    var $_type = 'code128';
    var $_barcodeheight = 60;
    var $_font = 2;  
    var $_barwidth = 1;
    var $code;

// The draw() method is broken into three sections.  First, we take
// the input string and convert it to a string of barcode widths.
// Then, we size and allocate the image.  Finally, we print the bars to
// the image along with the barcode text and display it to the beholder.

    /**
     * Draws a Code128 image barcode
     *
     * @param  string $text     A text that should be in the image barcode
     * @param  string $imgtype  The image type that will be generated
     *
     * @return image            The corresponding Interleaved 2 of 5 image barcode
     *
     * @access public
     *
     * @author Jeffrey K. Brown <jkb@darkfantastic.net>
     *
     */
    function draw($text, $imgtype = 'png')  {

        // We start with the Code128 Start Code character.  We
        // initialize checksum to 104, rather than calculate it.
        // We then add the startcode to $allbars, the main string
        // containing the bar sizes for the entire code.

    $startcode= $this->getStartCode();
    $checksum = 104;
    $allbars = $startcode;  


    // Next, we read the $text string that was passed to the
    // method and for each character, we determine the bar
    // pattern and add it to the end of the $allbars string.
    // In addition, we continually add the character's value
    // to the checksum

    $bars="";
    for ($i=0; $i < strlen($text); ++$i) {

        $char = $text[$i];
        $val = $this->getCharNumber($char);

        $checksum += ($val * ($i + 1));

        $bars = $this->getCharCode($char);
        $allbars = "".$allbars.$bars."";
    }


    // Then, Take the Mod 103 of the total to get the index
    // of the Code128 Check Character.  We get its bar
    // pattern and add it to $allbars in the next section.

    $checkdigit = $checksum % 103;
    $bars = $this->getNumCode($checkdigit);


    // Finally, we get the Stop Code pattern and put the
    // remaining pieces together.  We are left with the
    // string $allbars containing all of the bar widths
    // and can now think about writing it to the image.

    $stopcode = $this->getStopCode();
    $allbars = "".$allbars."".$bars."".$stopcode."";

    //------------------------------------------------------//
    // Next, we will calculate the width of the resulting
    // bar code and size the image accordingly. 

    // 10 Pixel "Quiet Zone" in front, and 10 Pixel 
    // "Quiet Zone" at the end.
    $barcodewidth = 20; 


    // We will read each of the characters (1,2,3,or 4) in
    // the $allbars string and add its width to the running
    // total $barcodewidth.  The height of the barcode is
    // calculated by taking the bar height plus the font height.

    for ($i=0; $i < strlen($allbars); ++$i) {
        $nval = $allbars[$i];
        $barcodewidth += ($nval * $this->_barwidth);
    }
    $barcodelongheight = (int) (imagefontheight($this->_font) / 2) + $this->_barcodeheight;


        // Then, we create the image, allocate the colors, and fill
    // the image with a nice, white background, ready for printing
    // our black bars and the text.

        $img = ImageCreate($barcodewidth, $barcodelongheight+ imagefontheight($this->_font)+1);
        $black = ImageColorAllocate($img, 0, 0, 0);
        $white = ImageColorAllocate($img, 255, 255, 255);
        imagefill($img, 0, 0, $white);


    //------------------------------------------------------//
    // Finally, we write our text line centered across the
    // bottom and the bar patterns and display the image.


    // First, print the image, centered across the bottom.
    imagestring($img, $this->_font, $barcodewidth/2-strlen($text)/2*(imagefontwidth($this->_font)), $this->_barcodeheight + imagefontheight($this->_font)/2, $text, $black);

    // We set $xpos to 10 so we start bar printing after 
    // position 10 to simulate the 10 pixel "Quiet Zone"
    $xpos = 10;

    // We will now process each of the characters in the $allbars
    // array.  The number in each position is read and then alternating
    // black bars and spaces are drawn with the corresponding width.
    $bar = 1;
    for ($i=0; $i < strlen($allbars); ++$i) {
        $nval = $allbars[$i];
        $width = $nval * $this->_barwidth;

        if ($bar==1) {
            imagefilledrectangle($img, $xpos, 0, $xpos + $width-1, $barcodelongheight, $black);
            $xpos += $width;
            $bar = 0;
        }
        else {
            $xpos += $width;
            $bar = 1;
        }
    }

        // Finally, we send the image to browser based on the
    // type of image requested.
        switch($imgtype) {

            case 'gif':
                header("Content-type: image/gif");
                imagegif($img);
                imagedestroy($img);
            break;

            case 'jpg':
                header("Content-type: image/jpg");
        imagejpeg($img);
        imagedestroy($img);
            break;

            default:
                header("Content-type: image/png");
                imagepng($img);
                imagedestroy($img);
             break;
        }
        return;

    } // function draw()


//-------------------------------------------------------------    
// In the Image_Barcode_code128 constructor, we initialize
// the $code array, containing the bar and space pattern
// for the Code128 B character set.
function Image_Barcode_code128() {
    $this->code[0] = "212222";  // " "
    $this->code[1] = "222122";  // "!"
    $this->code[2] = "222221";  // "{QUOTE}"
    $this->code[3] = "121223";  // "#"
    $this->code[4] = "121322";  // "$"
    $this->code[5] = "131222";  // "%"
    $this->code[6] = "122213";  // "&"
    $this->code[7] = "122312";  // "'"
    $this->code[8] = "132212";  // "("
    $this->code[9] = "221213";  // ")"
    $this->code[10] = "221312"; // "*"
    $this->code[11] = "231212"; // "+"
    $this->code[12] = "112232"; // ","
    $this->code[13] = "122132"; // "-"
    $this->code[14] = "122231"; // "."
    $this->code[15] = "113222"; // "/"
    $this->code[16] = "123122"; // "0"
    $this->code[17] = "123221"; // "1"
    $this->code[18] = "223211"; // "2"
    $this->code[19] = "221132"; // "3"
    $this->code[20] = "221231"; // "4"
    $this->code[21] = "213212"; // "5"
    $this->code[22] = "223112"; // "6"
    $this->code[23] = "312131"; // "7"
    $this->code[24] = "311222"; // "8"
    $this->code[25] = "321122"; // "9"
    $this->code[26] = "321221"; // ":"
    $this->code[27] = "312212"; // ";"
    $this->code[28] = "322112"; // "<"
    $this->code[29] = "322211"; // "="
    $this->code[30] = "212123"; // ">"
    $this->code[31] = "212321"; // "?"
    $this->code[32] = "232121"; // "@"
    $this->code[33] = "111323"; // "A"
    $this->code[34] = "131123"; // "B"
    $this->code[35] = "131321"; // "C"
    $this->code[36] = "112313"; // "D"
    $this->code[37] = "132113"; // "E"
    $this->code[38] = "132311"; // "F"
    $this->code[39] = "211313"; // "G"
    $this->code[40] = "231113"; // "H"
    $this->code[41] = "231311"; // "I"
    $this->code[42] = "112133"; // "J"
    $this->code[43] = "112331"; // "K"
    $this->code[44] = "132131"; // "L"
    $this->code[45] = "113123"; // "M"
    $this->code[46] = "113321"; // "N"
    $this->code[47] = "133121"; // "O"
    $this->code[48] = "313121"; // "P"
    $this->code[49] = "211331"; // "Q"
    $this->code[50] = "231131"; // "R"
    $this->code[51] = "213113"; // "S"
    $this->code[52] = "213311"; // "T"
    $this->code[53] = "213131"; // "U"
    $this->code[54] = "311123"; // "V"
    $this->code[55] = "311321"; // "W"
    $this->code[56] = "331121"; // "X"
    $this->code[57] = "312113"; // "Y"
    $this->code[58] = "312311"; // "Z"
    $this->code[59] = "332111"; // "["
    $this->code[60] = "314111"; // "\"
    $this->code[61] = "221411"; // "]"
    $this->code[62] = "431111"; // "^"
    $this->code[63] = "111224"; // "_"
    $this->code[64] = "111422"; // "`"
    $this->code[65] = "121124"; // "a"
    $this->code[66] = "121421"; // "b"
    $this->code[67] = "141122"; // "c"
    $this->code[68] = "141221"; // "d"
    $this->code[69] = "112214"; // "e"
    $this->code[70] = "112412"; // "f"
    $this->code[71] = "122114"; // "g"
    $this->code[72] = "122411"; // "h"
    $this->code[73] = "142112"; // "i"
    $this->code[74] = "142211"; // "j"
    $this->code[75] = "241211"; // "k"
    $this->code[76] = "221114"; // "l"
    $this->code[77] = "413111"; // "m"
    $this->code[78] = "241112"; // "n"
    $this->code[79] = "134111"; // "o"
    $this->code[80] = "111242"; // "p"
    $this->code[81] = "121142"; // "q"
    $this->code[82] = "121241"; // "r"
    $this->code[83] = "114212"; // "s"
    $this->code[84] = "124112"; // "t"
    $this->code[85] = "124211"; // "u"
    $this->code[86] = "411212"; // "v"
    $this->code[87] = "421112"; // "w"
    $this->code[88] = "421211"; // "x"
    $this->code[89] = "212141"; // "y"
    $this->code[90] = "214121"; // "z"
    $this->code[91] = "412121"; // "{"
    $this->code[92] = "111143"; // "|"
    $this->code[93] = "111341"; // "}"
    $this->code[94] = "131141"; // "~"
    $this->code[95] = "114113"; // 95
    $this->code[96] = "114311"; // 96
    $this->code[97] = "411113"; // 97
    $this->code[98] = "411311"; // 98
    $this->code[99] = "113141"; // 99
    $this->code[100] = "114131"; // 100
    $this->code[101] = "311141"; // 101
    $this->code[102] = "411131"; // 102

    //return $code; 
}

//-------------------------------------------------------------
// Return the Code128 code for a character
function getCharCode($c) {
    $retval = $this->code[ord($c) - 32];
    return $retval;
}

//-------------------------------------------------------------
// Return the Start Code for Code128
function getStartCode() {
    return "211214";
}

//-------------------------------------------------------------
// Return the Stop Code for Code128
function getStopCode() {
    return "2331112";
}

//-------------------------------------------------------------
// Return the Code128 code equivalent of a character number
function getNumCode($index) {
    $retval = $this->code[$index];
    return $retval;
}

//-------------------------------------------------------------
// Return the Code128 numerical equivalent of a character.
function getCharNumber($c) {
    $retval = ord($c) - 32;
    return $retval;
}


} // class


/**
 * Image_Barcode_Code39 class
 *
 * Image_Barcode_Code39 creates Code 3 of 9 ( Code39 ) barcode images. It's
 * implementation borrows heavily for the perl module GD::Barcode::Code39
 *
 * PHP versions 4
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Ryan Briones <ryanbriones@webxdesign.org>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Code39.php,v 1.2 2005/05/30 04:31:41 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */



/*
if ( !function_exists('str_split') ) {
    require_once "PHP/Compat.php";
    PHP_Compat::loadFunction('str_split');
}
*/
/**
 * Image_Barcode_Code39 class
 *
 * Package which provides a method to create Code39 using GD library.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Ryan Briones <ryanbriones@webxdesign.org>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Image_Barcode
 * @since      Image_Barcode 0.5
 */
class Image_Barcode_Code39 extends Barcode {
    /**
     * Barcode type
     * @var string
     */
    var $_type = 'Code39';

    /**
     * Barcode height
     *
     * @var integer
     */
    var $_barcodeheight = 50;

    /**
     * Bar thin width
     *
     * @var integer
     */
    var $_barthinwidth = 1;

    /**
     * Bar thick width
     *
     * @var integer
     */
    var $_barthickwidth = 3;

    /**
     * Coding map
     * @var array
     */
    var $_coding_map = array(
        '0' => '000110100',
        '1' => '100100001',
        '2' => '001100001',
        '3' => '101100000',
        '4' => '000110001',
        '5' => '100110000',
        '6' => '001110000',
        '7' => '000100101',
        '8' => '100100100',
        '9' => '001100100',
        'A' => '100001001',
        'B' => '001001001',
        'C' => '101001000',
        'D' => '000011001',
        'E' => '100011000',
        'F' => '001011000',
        'G' => '000001101',
        'H' => '100001100',
        'I' => '001001100',
        'J' => '000011100',
        'K' => '100000011',
        'L' => '001000011',
        'M' => '101000010',
        'N' => '000010011',
        'O' => '100010010',
        'P' => '001010010',
        'Q' => '000000111',
        'R' => '100000110',
        'S' => '001000110',
        'T' => '000010110',
        'U' => '110000001',
        'V' => '011000001',
        'W' => '111000000',
        'X' => '010010001',
        'Y' => '110010000',
        'Z' => '011010000',
        '-' => '010000101',
        '*' => '010010100',
        '+' => '010001010',
        '$' => '010101000',
        '%' => '000101010',
        '/' => '010100010',
        '.' => '110000100',
        ' ' => '011000100'
    );

    /**
     * Constructor
     *
     * @param  string $text     A text that should be in the image barcode
     * @param  int $wThin       Width of the thin lines on the barcode
     * @param  int $wThick      Width of the thick lines on the barcode
     *
     * @author Ryan Briones <ryanbriones@webxdesign.org>
     *
     */
    function Image_Barcode_Code39( $text = '', $wThin = 0, $wThick = 0 ) {

        // Check $text for invalid characters
        if ( $this->checkInvalid( $text ) ) {
            return false;
        }

        $this->text = $text;
        if ( $wThin > 0 ) $this->_barthinwidth = $wThin;
        if ( $wThick > 0 ) $this->_barthickwidth = $wThick;

        return true;
    }

   /**
    * Make an image resource using the GD image library
    *
    * @param    bool $noText       Set to true if you'd like your barcode to be sans text
    * @param    int $bHeight       height of the barcode image including text
    * @return   resource           The Barcode Image (TM)
    *
    * @author   Ryan Briones <ryanbriones@webxdesign.org>
    *
    */
    function plot( $noText = false, $bHeight = 0 ) {
       // add start and stop * characters
       $final_text = "*" . $this->text . "*";

             if ( $bHeight > 0 ) {
                 $this->_barcodeheight = $bHeight;
             }

       $barcode = '';
       foreach ($this->str_split( $final_text ) as $character ) {
           $barcode .= $this->_dumpCode( $this->_coding_map[$character] . '0' );
       }

       $barcode_len = strlen( $barcode );

       // Create GD image object
       $img = imagecreate( $barcode_len, $this->_barcodeheight );

       // Allocate black and white colors to the image
       $black = imagecolorallocate( $img, 0, 0, 0 );
       $white = imagecolorallocate( $img, 255, 255, 255 );
       $font_height = ( $noText ? 0 : imagefontheight( "gdFontSmall" ) );
       $font_width = imagefontwidth( "gdFontSmall" );

       // fill background with white color
       imagefill( $img, 0, 0, $white );

       // Initialize X position
       $xpos = 0;

       // draw barcode bars to image
             if ( $noText ) {
                 foreach ( str_split( $barcode ) as $character_code ) {
                         if ( $character_code == 0 ) {
                                 imageline( $img, $xpos, 0, $xpos, $this->_barcodeheight, $white );
                         } else {
                                 imageline( $img, $xpos, 0, $xpos, $this->_barcodeheight, $black );
                         }

                         $xpos++;
                    }
                } else {
                     foreach ( $this->str_split( $barcode ) as $character_code ) {
                             if ( $character_code == 0 ) {
                                     imageline( $img, $xpos, 0, $xpos, $this->_barcodeheight - $font_height - 1, $white );
                             } else {
                                     imageline( $img, $xpos, 0, $xpos, $this->_barcodeheight - $font_height - 1, $black );
                             }

                             $xpos++;
                        }

                        // draw text under barcode
                        imagestring( $img, "gdFontSmall", 
                                ( $barcode_len - $font_width * strlen( $this->text ) )/2,
                                $this->_barcodeheight - $font_height,
                                $this->text,
                                $black );
                }

        return $img;
    }

    /**
     * Send image to the browser; for Image_Barcode compaitbility
     *
     * @param    string $text
     * @param    string $imgtype     Image type; accepts jpg, png, and gif, but gif only works if you've payed for licensing
     * @param    bool $noText        Set to true if you'd like your barcode to be sans text
     * @param    int $bHeight        height of the barcode image including text
     * @return   bool                true or die
     *
     * @author   Ryan Briones <ryanbriones@webxdesign.org>
     *
     */
    function draw( $text, $imgtype = 'png', $noText = false, $bHeight = 0 ) {
        // Check $text for invalid characters
        if ( $this->checkInvalid( $text ) ) {
            return false;
        }

        $this->text = $text;
        $img = $this->plot( $noText, $bHeight );

                // Send image to browser
                switch($imgtype) {
                        case 'gif':
                        //header("Content-type: image/gif");
                        imagegif($img, ROOT_PATH.'/images/barcode/'.$text.'.gif');
                        imagedestroy($img);
                        break;

                    case 'jpg':
                        //header("Content-type: image/jpg");
                        imagejpeg($img,ROOT_PATH.'/images/barcode/'.$text.'.jpg');
                        imagedestroy($img);
                    break;

                    default:
                        //header("Content-type: image/png");
                        //imagepng($img);
                       	imagepng($img,ROOT_PATH.'/images/barcode/'.$text.'.png');
                        imagedestroy($img);
                    break;
                }

                return true;
    }

    /**
     * _dumpCode is a PHP implementation of dumpCode from the Perl module
     * GD::Barcode::Code39. I royally screwed up when trying to do the thing
     * my own way the first time. This way works.
     *
     * @param   string $code        Code39 barcode code
     * @return  string $result      barcode line code
     *
     * @access  private
     *
     * @author   Ryan Briones <ryanbriones@webxdesign.org>
     *
     *
     */
    function _dumpCode( $code ) {
        $result = '';
        $color = 1; // 1: Black, 0: White

        // if $bit is 1, line is wide; if $bit is 0 line is thin
        foreach ( $this->str_split( $code ) as $bit ) {
            $result .= ( ( $bit == 1 ) ? str_repeat( "$color", $this->_barthickwidth ) : str_repeat( "$color", $this->_barthinwidth ) );
            $color = ( ( $color == 0 ) ? 1 : 0 );
        }

        return $result;
    }

    /**
     * Check for invalid characters
     *
     * @param   string $text    text to be ckecked
     * @return  bool            returns true when invalid characters have been found
     *
     * @author  Ryan Briones <ryanbriones@webxdesign.org>
     *
     */
    function checkInvalid( $text ) {
        return preg_match( "/[^0-9A-Z\-*+\$%\/. ]/", $text );
 



   }



    function str_split($string, $split_length = 1)
    {
        if (!is_scalar($split_length)) {
            user_error('str_split() expects parameter 2 to be long, ' .
                gettype($split_length) . ' given', E_USER_WARNING);
            return false;
        }

        $split_length = (int) $split_length;
        if ($split_length < 1) {
            user_error('str_split() The length of each segment must be greater than zero', E_USER_WARNING);
            return false;
        }
        
        // Select split method
        if ($split_length < 65536) {
            // Faster, but only works for less than 2^16
            preg_match_all('/.{1,' . $split_length . '}/s', $string, $matches);
            return $matches[0];
        } else {
            // Required due to preg limitations
            $arr = array();
            $idx = 0;
            $pos = 0;
            $len = strlen($string);

            while ($len > 0) {
                $blk = ($len < $split_length) ? $len : $split_length;
                $arr[$idx++] = substr($string, $pos, $blk);
                $pos += $blk;
                $len -= $blk;
            }

            return $arr;
        }
    }



}


/**
 * Image_Barcode_ean13 class
 *
 * Renders EAN 13 barcodes
 *
 * PHP versions 4
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Didier Fournout <didier.fournout@nyc.fr>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: ean13.php,v 1.2 2005/05/30 04:31:41 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */


/**
 * Image_Barcode_ean13 class
 *
 * Package which provides a method to create EAN 13 barcode using GD library.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Didier Fournout <didier.fournout@nyc.fr>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Image_Barcode
 * @since      Image_Barcode 0.4
 */
class Image_Barcode_ean13 extends Barcode
{
    /**
     * Barcode type
     * @var string
     */
    var $_type = 'ean13';

    /**
     * Barcode height
     *
     * @var integer
     */
    var $_barcodeheight = 50;

    /**
     * Font use to display text
     *
     * @var integer
     */
    var $_font = 2;  // gd internal small font

    /**
     * Bar width
     *
     * @var integer
     */
    var $_barwidth = 1;


    /**
     * Number set
     * @var array
     */
    var $_number_set = array(
           '0' => array(
                    'A' => array(0,0,0,1,1,0,1),
                    'B' => array(0,1,0,0,1,1,1),
                    'C' => array(1,1,1,0,0,1,0)
                        ),
           '1' => array(
                    'A' => array(0,0,1,1,0,0,1),
                    'B' => array(0,1,1,0,0,1,1),
                    'C' => array(1,1,0,0,1,1,0)
                        ),
           '2' => array(
                    'A' => array(0,0,1,0,0,1,1),
                    'B' => array(0,0,1,1,0,1,1),
                    'C' => array(1,1,0,1,1,0,0)
                        ),
           '3' => array(
                    'A' => array(0,1,1,1,1,0,1),
                    'B' => array(0,1,0,0,0,0,1),
                    'C' => array(1,0,0,0,0,1,0)
                        ),
           '4' => array(
                    'A' => array(0,1,0,0,0,1,1),
                    'B' => array(0,0,1,1,1,0,1),
                    'C' => array(1,0,1,1,1,0,0)
                        ),
           '5' => array(
                    'A' => array(0,1,1,0,0,0,1),
                    'B' => array(0,1,1,1,0,0,1),
                    'C' => array(1,0,0,1,1,1,0)
                        ),
           '6' => array(
                    'A' => array(0,1,0,1,1,1,1),
                    'B' => array(0,0,0,0,1,0,1),
                    'C' => array(1,0,1,0,0,0,0)
                        ),
           '7' => array(
                    'A' => array(0,1,1,1,0,1,1),
                    'B' => array(0,0,1,0,0,0,1),
                    'C' => array(1,0,0,0,1,0,0)
                        ),
           '8' => array(
                    'A' => array(0,1,1,0,1,1,1),
                    'B' => array(0,0,0,1,0,0,1),
                    'C' => array(1,0,0,1,0,0,0)
                        ),
           '9' => array(
                    'A' => array(0,0,0,1,0,1,1),
                    'B' => array(0,0,1,0,1,1,1),
                    'C' => array(1,1,1,0,1,0,0)
                        )
        );

    var $_number_set_left_coding = array(
           '0' => array('A','A','A','A','A','A'),
           '1' => array('A','A','B','A','B','B'),
           '2' => array('A','A','B','B','A','B'),
           '3' => array('A','A','B','B','B','A'),
           '4' => array('A','B','A','A','B','B'),
           '5' => array('A','B','B','A','A','B'),
           '6' => array('A','B','B','B','A','A'),
           '7' => array('A','B','A','B','A','B'),
           '8' => array('A','B','A','B','B','A'),
           '9' => array('A','B','B','A','B','A')
        );

    /**
     * Draws a EAN 13 image barcode
     *
     * @param  string $text     A text that should be in the image barcode
     * @param  string $imgtype  The image type that will be generated
     *
     * @return image            The corresponding Interleaved 2 of 5 image barcode
     *
     * @access public
     *
     * @author     Didier Fournout <didier.fournout@nyc.fr>
     *
     */
    function draw($text, $imgtype = 'png')
    {
        //TODO: Check if $text is number and len=13

        // Calculate the barcode width
        $barcodewidth = (strlen($text)) * (7 * $this->_barwidth)
            + 3 // left
            + 5 // center
            + 3 // right
            + imagefontwidth($this->_font)+1
            ;

        $barcodelongheight = (int) (imagefontheight($this->_font)/2)+$this->_barcodeheight;

        // Create the image
        $img = ImageCreate($barcodewidth, $barcodelongheight+ imagefontheight($this->_font)+1);

        // Alocate the black and white colors
        $black = ImageColorAllocate($img, 0, 0, 0);
        $white = ImageColorAllocate($img, 255, 255, 255);

        // Fill image with white color
        imagefill($img, 0, 0, $white);

        // get the first digit which is the key for creating the first 6 bars
        $key = substr($text,0,1);

        // Initiate x position
        $xpos = 0;

        // print first digit
        imagestring($img, $this->_font, $xpos, $this->_barcodeheight, $key, $black);
        $xpos= imagefontwidth($this->_font) + 1;

        // Draws the left guard pattern (bar-space-bar)
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;

        // Draw left $text contents
        $set_array=$this->_number_set_left_coding[$key];
        for ($idx = 1; $idx < 7; $idx ++) {
            $value=substr($text,$idx,1);
            imagestring ($img, $this->_font, $xpos+1, $this->_barcodeheight, $value, $black);
            foreach ($this->_number_set[$value][$set_array[$idx-1]] as $bar) {
                if ($bar) {
                    imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_barcodeheight, $black);
                }
                $xpos += $this->_barwidth;
            }
        }

        // Draws the center pattern (space-bar-space-bar-space)
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;


        // Draw right $text contents
        for ($idx = 7; $idx < 13; $idx ++) {
            $value=substr($text,$idx,1);
            imagestring ($img, $this->_font, $xpos+1, $this->_barcodeheight, $value, $black);
            foreach ($this->_number_set[$value]['C'] as $bar) {
                if ($bar) {
                    imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_barcodeheight, $black);
                }
                $xpos += $this->_barwidth;
            }
        }

        // Draws the right guard pattern (bar-space-bar)
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;

        // Send image to browser
        switch($imgtype) {

            case 'gif':
                header("Content-type: image/gif");
                imagegif($img);
                imagedestroy($img);
            break;

            case 'jpg':
                header("Content-type: image/jpg");
                imagejpeg($img);
                imagedestroy($img);
            break;

            default:
                header("Content-type: image/png");
                imagepng($img);
                imagedestroy($img);
            break;

        }

        return;

    } // function create

} // class


/**
 * Image_Barcode_int25 class
 *
 * Renders Interleaved 2 of 5 barcodes
 *
 * PHP versions 4
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Marcelo Subtil Marcal <msmarcal@php.net>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: int25.php,v 1.2 2005/05/30 04:31:41 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */



/**
 * Image_Barcode_int25 class
 *
 * Package which provides a method to create Interleaved 2 of 5 barcode using GD library.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Marcelo Subtil Marcal <msmarcal@php.net>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Image_Barcode
 */
class Image_Barcode_int25 extends Barcode
{
    /**
     * Barcode type
     * @var string
     */
    var $_type = 'int25';

    /**
     * Barcode height
     *
     * @var integer
     */
    var $_barcodeheight = 50;

    /**
     * Bar thin width
     *
     * @var integer
     */
    var $_barthinwidth = 1;

    /**
     * Bar thick width
     *
     * @var integer
     */
    var $_barthickwidth = 3;

    /**
     * Coding map
     * @var array
     */
    var $_coding_map = array(
           '0' => '00110',
           '1' => '10001',
           '2' => '01001',
           '3' => '11000',
           '4' => '00101',
           '5' => '10100',
           '6' => '01100',
           '7' => '00011',
           '8' => '10010',
           '9' => '01010'
        );

    /**
     * Draws a Interleaved 2 of 5 image barcode
     *
     * @param  string $text     A text that should be in the image barcode
     * @param  string $imgtype  The image type that will be generated
     *
     * @return image            The corresponding Interleaved 2 of 5 image barcode
     *
     * @access public
     *
     * @author Marcelo Subtil Marcal <msmarcal@php.net>
     * @since  Image_Barcode 0.3
     */

    function draw($text, $imgtype = 'png')
    {

        $text = trim($text);

        if (!preg_match("/[0-9]/",$text)) return;

        // if odd $text lenght adds a '0' at string beginning
        $text = strlen($text) % 2 ? '0' . $text : $text;

        // Calculate the barcode width
        $barcodewidth = (strlen($text)) * (3 * $this->_barthinwidth + 2 * $this->_barthickwidth) +
            (strlen($text)) * 2.5 +
            (7 * $this->_barthinwidth + $this->_barthickwidth) + 3;

        // Create the image
        $img = ImageCreate($barcodewidth, $this->_barcodeheight);

        // Alocate the black and white colors
        $black = ImageColorAllocate($img, 0, 0, 0);
        $white = ImageColorAllocate($img, 255, 255, 255);

        // Fill image with white color
        imagefill($img, 0, 0, $white);

        // Initiate x position
        $xpos = 0;

        // Draws the leader
        for ($i=0; $i < 2; $i++) {
            $elementwidth = $this->_barthinwidth;
            imagefilledrectangle($img, $xpos, 0, $xpos + $elementwidth - 1, $this->_barcodeheight, $black);
            $xpos += $elementwidth;
            $xpos += $this->_barthinwidth;
            $xpos ++;
        }

        // Draw $text contents
        for ($idx = 0; $idx < strlen($text); $idx += 2) {       // Draw 2 chars at a time
            $oddchar  = substr($text, $idx, 1);                 // get odd char
            $evenchar = substr($text, $idx + 1, 1);             // get even char

            // interleave
            for ($baridx = 0; $baridx < 5; $baridx++) {

                // Draws odd char corresponding bar (black)
                $elementwidth = (substr($this->_coding_map[$oddchar], $baridx, 1)) ?  $this->_barthickwidth : $this->_barthinwidth;
                imagefilledrectangle($img, $xpos, 0, $xpos + $elementwidth - 1, $this->_barcodeheight, $black);
                $xpos += $elementwidth;

                // Left enought space to draw even char (white)
                $elementwidth = (substr($this->_coding_map[$evenchar], $baridx, 1)) ?  $this->_barthickwidth : $this->_barthinwidth;
                $xpos += $elementwidth; 
                $xpos ++;
            }
        }


        // Draws the trailer
        $elementwidth = $this->_barthickwidth;
        imagefilledrectangle($img, $xpos, 0, $xpos + $elementwidth - 1, $this->_barcodeheight, $black);
        $xpos += $elementwidth;
        $xpos += $this->_barthinwidth;
        $xpos ++;
        $elementwidth = $this->_barthinwidth;
        imagefilledrectangle($img, $xpos, 0, $xpos + $elementwidth - 1, $this->_barcodeheight, $black);

        // Send image to browser
        switch($imgtype) {

            case 'gif':
                header("Content-type: image/gif");
                imagegif($img);
                imagedestroy($img);
            break;

            case 'jpg':
                header("Content-type: image/jpg");
                imagejpeg($img);
                imagedestroy($img);
            break;

            default:
                header("Content-type: image/png");
                imagepng($img);
                imagedestroy($img);
            break;

        }

        return;

    } // function create

} // class


/**
 * Image_Barcode_postnet class
 *
 * Renders PostNet barcodes
 *
 * PHP versions 4
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Josef "Jeff" Sipek <jeffpc@optonline.net>
 * @copyright  2005 Josef "Jeff" Sipek
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: postnet.php,v 1.1 2005/06/03 11:44:42 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */

 /*
  * Note:
  *
  * The generated barcode must fit the following criteria to be useable
  * by the USPS scanners:
  *
  * When printed, the dimensions should be:
  *
  *     tall bar:       1/10 inches     = 2.54 mm
  *  short bar:      1/20 inches     = 1.27 mm
  *  density:        22 bars/inch    = 8.66 bars/cm
  */



/**
 * Image_Barcode_postnet class
 *
 * Package which provides a method to create PostNet barcode using GD library.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Josef "Jeff" Sipek <jeffpc@optonline.net>
 * @copyright  2005 Josef "Jeff" Sipek
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: postnet.php,v 1.1 2005/06/03 11:44:42 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */
class Image_Barcode_postnet extends Barcode
{
    /**
     * Barcode type
     * @var string
     */
    var $_type = 'postnet';

    /**
     * Bar short height
     *
     * @var integer
     */
    var $_barshortheight = 7;

    /**
     * Bar tall height
     *
     * @var integer
     */
    var $_bartallheight = 15;

    /**
     * Bar width / scaling factor
     *
     * @var integer
     */
    var $_barwidth = 2;

    /**
     * Coding map
     * @var array
     */
    var $_coding_map = array(
           '0' => '11000',
           '1' => '00011',
           '2' => '00101',
           '3' => '00110',
           '4' => '01001',
           '5' => '01010',
           '6' => '01100',
           '7' => '10001',
           '8' => '10010',
           '9' => '10100'
        );

    /**
     * Draws a PostNet image barcode
     *
     * @param  string $text     A text that should be in the image barcode
     * @param  string $imgtype  The image type that will be generated
     *
     * @return image            The corresponding Interleaved 2 of 5 image barcode
     *
     * @access public
     *
     * @author Josef "Jeff" Sipek <jeffpc@optonline.net>
     * @since  Image_Barcode 0.3
     */

    function draw($text, $imgtype = 'png')
    {

        $text = trim($text);

        if (!preg_match("/[0-9]/",$text)) return;

        // Calculate the barcode width
        $barcodewidth = (strlen($text)) * 2 * 5 * $this->_barwidth + $this->_barwidth*3;

        // Create the image
        $img = ImageCreate($barcodewidth, $this->_bartallheight);

        // Alocate the black and white colors
        $black = ImageColorAllocate($img, 0, 0, 0);
        $white = ImageColorAllocate($img, 255, 255, 255);

        // Fill image with white color
        imagefill($img, 0, 0, $white);

        // Initiate x position
        $xpos = 0;

        // Draws the leader
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_bartallheight, $black);
        $xpos += 2*$this->_barwidth;

        // Draw $text contents
        for ($idx = 0; $idx < strlen($text); $idx++) {
            $char  = substr($text, $idx, 1);

            for ($baridx = 0; $baridx < 5; $baridx++) {
                $elementheight = (substr($this->_coding_map[$char], $baridx, 1)) ?  0 : $this->_barshortheight;
                imagefilledrectangle($img, $xpos, $elementheight, $xpos + $this->_barwidth - 1, $this->_bartallheight, $black);
                $xpos += 2*$this->_barwidth;
            }
        }

        // Draws the trailer
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_bartallheight, $black);
        $xpos += 2*$this->_barwidth;

    // Send image to browser
        switch($imgtype) {

            case 'gif':
                header("Content-type: image/gif");
                imagegif($img);
                imagedestroy($img);
            break;

            case 'jpg':
                header("Content-type: image/jpg");
                imagejpeg($img);
                imagedestroy($img);
            break;

            default:
                header("Content-type: image/png");
                imagepng($img);
                imagedestroy($img);
            break;

        }

        return;

    } // function create

} // class

/**
 * Image_Barcode_upca class
 *
 * Renders UPC-A barcodes
 *
 * PHP versions 4
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Jeffrey K. Brown <jkb@darkfantastic.net>
 * @author     Didier Fournout <didier.fournout@nyc.fr>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: upca.php,v 1.2 2005/05/30 04:31:41 msmarcal Exp $
 * @link       http://pear.php.net/package/Image_Barcode
 */


/**
 * Image_Barcode_upca class
 *
 * Package which provides a method to create UPC-A barcode using GD library.
 *
 * Slightly Modified ean13.php to get upca.php I needed a way to print
 * UPC-A bar codes on a PHP page.  The Image_Barcode class seemed like
 * the best way to do it, so I modified ean13 to print in the UPC-A format.
 * Checked the bar code tables against some documentation below (no errors)
 * and validated the changes with my trusty cue-cat.
 * http://www.indiana.edu/~atmat/units/barcodes/bar_t4.htm
 *
 * @category   Image
 * @package    Image_Barcode
 * @author     Jeffrey K. Brown <jkb@darkfantastic.net>
 * @author     Didier Fournout <didier.fournout@nyc.fr>
 * @copyright  2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Image_Barcode
 */
class Image_Barcode_upca extends Barcode
{
    /**
     * Barcode type
     * @var string
     */
    var $_type = 'upca';

    /**
     * Barcode height
     *
     * @var integer
     */
    var $_barcodeheight = 50;

    /**
     * Font use to display text
     *
     * @var integer
     */
    var $_font = 2;  // gd internal small font

    /**
     * Bar width
     *
     * @var integer
     */
    var $_barwidth = 1;


    /**
     * Number set
     * @var array
     */
    var $_number_set = array(
           '0' => array(
                    'A' => array(0,0,0,1,1,0,1),
                    'B' => array(0,1,0,0,1,1,1),
                    'C' => array(1,1,1,0,0,1,0)
                        ),
           '1' => array(
                    'A' => array(0,0,1,1,0,0,1),
                    'B' => array(0,1,1,0,0,1,1),
                    'C' => array(1,1,0,0,1,1,0)
                        ),
           '2' => array(
                    'A' => array(0,0,1,0,0,1,1),
                    'B' => array(0,0,1,1,0,1,1),
                    'C' => array(1,1,0,1,1,0,0)
                        ),
           '3' => array(
                    'A' => array(0,1,1,1,1,0,1),
                    'B' => array(0,1,0,0,0,0,1),
                    'C' => array(1,0,0,0,0,1,0)
                        ),
           '4' => array(
                    'A' => array(0,1,0,0,0,1,1),
                    'B' => array(0,0,1,1,1,0,1),
                    'C' => array(1,0,1,1,1,0,0)
                        ),
           '5' => array(
                    'A' => array(0,1,1,0,0,0,1),
                    'B' => array(0,1,1,1,0,0,1),
                    'C' => array(1,0,0,1,1,1,0)
                        ),
           '6' => array(
                    'A' => array(0,1,0,1,1,1,1),
                    'B' => array(0,0,0,0,1,0,1),
                    'C' => array(1,0,1,0,0,0,0)
                        ),
           '7' => array(
                    'A' => array(0,1,1,1,0,1,1),
                    'B' => array(0,0,1,0,0,0,1),
                    'C' => array(1,0,0,0,1,0,0)
                        ),
           '8' => array(
                    'A' => array(0,1,1,0,1,1,1),
                    'B' => array(0,0,0,1,0,0,1),
                    'C' => array(1,0,0,1,0,0,0)
                        ),
           '9' => array(
                    'A' => array(0,0,0,1,0,1,1),
                    'B' => array(0,0,1,0,1,1,1),
                    'C' => array(1,1,1,0,1,0,0)
                        )
        );


    var $_number_set_left_coding = array(
           '0' => array('A','A','A','A','A','A'),
           '1' => array('A','A','B','A','B','B'),
           '2' => array('A','A','B','B','A','B'),
           '3' => array('A','A','B','B','B','A'),
           '4' => array('A','B','A','A','B','B'),
           '5' => array('A','B','B','A','A','B'),
           '6' => array('A','B','B','B','A','A'),
           '7' => array('A','B','A','B','A','B'),
           '8' => array('A','B','A','B','B','A'),
           '9' => array('A','B','B','A','B','A')
        );



    /**
     * Draws a UPC-A image barcode
     *
     * @param   string $text     A text that should be in the image barcode
     * @param   string $imgtype  The image type that will be generated
     *
     * @return  image            The corresponding Interleaved 2 of 5 image barcode
     *
     * @access  public
     *
     * @author  Jeffrey K. Brown <jkb@darkfantastic.net>
     * @author  Didier Fournout <didier.fournout@nyc.fr>
     *
     */
    function draw($text, $imgtype = 'png')  {

        if ( (is_numeric($text)==false) || (strlen($text)!=12) )  {
            $barcodewidth= (12 * 7 * $this->_barwidth) + 3 + 5 + 3 + 2 * (imagefontwidth($this->_font)+1);
            $error = 1;
        }
        else {
            // Calculate the barcode width
            $barcodewidth = (strlen($text)) * (7 * $this->_barwidth)
                + 3 // left
                + 5 // center
                + 3 // right
                + imagefontwidth($this->_font)+1
                + imagefontwidth($this->_font)+1   // check digit's padding
                ;
        } 

        $barcodelongheight = (int) (imagefontheight($this->_font)/2)+$this->_barcodeheight;

        // Create the image
        $img = ImageCreate($barcodewidth, $barcodelongheight+ imagefontheight($this->_font)+1);

        // Alocate the black and white colors
        $black = ImageColorAllocate($img, 0, 0, 0);
        $white = ImageColorAllocate($img, 255, 255, 255);

        // Fill image with white color
        imagefill($img, 0, 0, $white);

        if ($error == 1) {
            $imgerror = ImageCreate($barcodewidth, $barcodelongheight+imagefontheight($this->_font)+1);
            $red = ImageColorAllocate($imgerror, 255, 0, 0);
            $black = ImageColorAllocate($imgerror, 0,0,0);
            imagefill($imgerror,0,0,$red);

            imagestring($imgerror, $this->_font, $barcodewidth/2-(10/2* imagefontwidth($this->_font)), $this->_barcodeheight/2, "Code Error", $black);
        }

        // get the first digit which is the key for creating the first 6 bars
        $key = substr($text,0,1);

        // Initiate x position
        $xpos = 0;

        // print first digit
        imagestring($img, $this->_font, $xpos, $this->_barcodeheight, $key, $black);
        $xpos= imagefontwidth($this->_font) + 1;



        // Draws the left guard pattern (bar-space-bar)
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;

        $set_array = $this->_number_set_left_coding[$key];



        foreach ($this->_number_set['0'][$set_array[0]] as $bar) {
            if ($bar) {
                imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
            }
            $xpos += $this->_barwidth;
        }



        // Draw left $text contents
        for ($idx = 1; $idx < 6; $idx ++) {
            $value=substr($text,$idx,1);
            imagestring ($img, $this->_font, $xpos+1, $this->_barcodeheight, $value, $black);

            //foreach ($this->_number_set[$value][$set_array[$idx-1]] as $bar) {

            foreach ($this->_number_set[$value][$set_array[$idx]] as $bar) {
                if ($bar) {
                    imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_barcodeheight, $black);
                }
                $xpos += $this->_barwidth;
            }
        }


        // Draws the center pattern (space-bar-space-bar-space)
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;


        // Draw right $text contents
        for ($idx = 6; $idx < 11; $idx ++) {
            $value=substr($text,$idx,1);
            imagestring ($img, $this->_font, $xpos+1, $this->_barcodeheight, $value, $black);
            foreach ($this->_number_set[$value]['C'] as $bar) {
                if ($bar) {
                    imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $this->_barcodeheight, $black);
                }
                $xpos += $this->_barwidth;
            }
        }



        $value = substr($text,11,1);
        foreach ($this->_number_set[$value]['C'] as $bar) {
            if ($bar) {
                imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
            }
            $xpos += $this->_barwidth;
        }



        // Draws the right guard pattern (bar-space-bar)
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;
        // space
        $xpos += $this->_barwidth;
        // bar
        imagefilledrectangle($img, $xpos, 0, $xpos + $this->_barwidth - 1, $barcodelongheight, $black);
        $xpos += $this->_barwidth;


        // Print Check Digit
        imagestring($img, $this->_font, $xpos+1, $this->_barcodeheight, $value, $black);



        // Send image to browser
        switch($imgtype) {

            case 'gif':
                header("Content-type: image/gif");

                if ($error==1) {
                    imagegif($imgerror);
                    imagedestroy($imgerror);
                }
                else {
                    imagegif($img);
                    imagedestroy($img);
                }
            break;

            case 'jpg':
                header("Content-type: image/jpg");
                if ($error==1) {
                    imageijpeg($imgerror);
                    imagedestroy($imgerror);
                }
                else {
                    imagejpeg($img);
                    imagedestroy($img);
                }
            break;

            default:
                header("Content-type: image/png");
                if ($error==1) {
                    imagepng($imgerror);
                    imagedestroy($imgerror);
                }
                else {
                    imagepng($img);
                    imagedestroy($img);
                }
            break;

        }

        return;

    } // function create

} // class

?>
