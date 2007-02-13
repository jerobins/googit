<?php
/*
Plugin Name: GoogIt 
Plugin URI: http://www.robinsonhouse.com/googit
Description: Replace <go>blah</go> with a Google i'm feeling lucky link
Version: 2.0
Author: James E. Robinson, III
Author URI: http://www.robinsonhouse.com/
*/
/*
 Copyright 2005 James E. Robinson, III (www.robinsonhouse.com)

 Redistribution and use in source and binary forms, with or without
 modification, are permitted provided that the following conditions are met:

 1. Redistributions of source code must retain the above copyright notice,
 this list of conditions and the following disclaimer.

 2. Redistributions in binary form must reproduce the above copyright notice,
 this list of conditions and the following disclaimer in the documentation
 and/or other materials provided with the distribution.

 3. The name of the author may not be used to endorse or promote products
 derived from this software without specific prior written permission.

 THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED
 WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO
 EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

/*
 UPGRADING from 1.0 to 2.0:
 Execute the following two SQL querries in phpMyAdmin
 update wp_posts set post_content = REPLACE(post_content, "<go>", "[go]");
 update wp_posts set post_content = REPLACE(post_content, "</go>", "[/go]");
 */

function googit($content='') {
   $pattern = '/\[go\](.*?)\[\/go\]/si';
   $replace = '<a href="http://www.google.com/search?btnI=1&amp;q=${1}" title="${1} lucky search">${1}</a>';
   return preg_replace($pattern, $replace, $content);
}

add_filter('the_content', 'googit');
add_filter('page_template', 'googit');
?>
