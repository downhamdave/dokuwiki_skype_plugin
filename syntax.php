<?php
/*
 * DokuWiki skype plugin
 * 2014 Zahno Silvan
 * Usage:
 *
 * {{skype>username,function}} 
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the LGNU Lesser General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * LGNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the LGNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_skype extends DokuWiki_Syntax_Plugin {

    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Zahno Silvan',
            'email'  => 'zaswiki@gmail.com',
            'date'   => '2014-06-16',
            'name'   => 'Skype Plugin',
            'desc'   => 'Skype Button',
            'url'    => 'http://zawiki.zapto.org/doku.php/tschinz:dw_skype',
        );
    }

    /**
     * What kind of syntax are we?
     */
    function getType(){
        return 'substition';
    }

    /**
     * Where to sort in?
     */
    function getSort(){
        return 299;
    }


    /**
     * Connect pattern to lexer
     */
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('\{\{skype>.*?\}\}',$mode,'plugin_skype');
    }

    /**
     * Handle the match
     */
    function handle($match, $state, $pos, DOKU_Handler $handler){
        switch ($state) {
          case DOKU_LEXER_ENTER :
            break;
          case DOKU_LEXER_MATCHED :
            break;
          case DOKU_LEXER_UNMATCHED :
            break;
          case DOKU_LEXER_EXIT :
            break;
          case DOKU_LEXER_SPECIAL :
            return $match;
            break;
        }
        return array();
    }

    /**
     * Create output
     */
    function render($mode, DOKU_Renderer $renderer, $data) {
        if($mode == 'xhtml'){
            $options['function']  = $this->getConf('function'); // default value
            $options['size']      = $this->getConf('size');
            $options['style']     = $this->getConf('style');

           // strip {{skype> from start
           $data     = substr($data,8);
           // strip }} from end
           $data     = substr($data,0,-2);
      
           //get function and username
           $var1='';
           $var2='';
           list($var1, $var2) = explode(',', $data, 2);
      
           if ($var1 == 'chat' or $var1 == 'call' or $var1 == 'dropdown')
           {
               $options['function'] = $var1;
               $data = $var2;
           }
           elseif ($var2 == 'chat' or $var2 == 'call' or $var2 == 'dropdown')
           {
               $options['function'] = $var2;
               $data = $var1;
           }
           else
           {
               $data = $var1;
           }
      
           if (empty($data))
           {
               $renderer->doc .= 'No skype name given';
               return true;
           }

           $code = '<script type="text/javascript" src="https://www.skypeassets.com/i/scom/js/skype-uri.js"></script>';
           $code .= '<div style="display: inline" id="SkypeButton_Call_'.$data.'_1">';
           $code .= '<script type="text/javascript">Skype.ui({';

           $code .= '"name": "'.$options['function'].'",';

           $code .= '"element": "SkypeButton_Call_'.$data.'_1",';
           $code .= '"participants": ["'.$data.'"],';
           if ($options['style'] == 'white') {
               $code .= '"imageColor": "white",';
           }
           $code .= '"imageSize": '.$options['size'];
           $code .= '});</script></div>';
           
           $renderer->doc .= $code;

           return true;
        }
    return false;
    }
}
