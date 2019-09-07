/*-------------------------------------------------------------------------------------
[TABLE OF CONTENTS]
    17. GOODSHARE
/*-----------------------------------------------------------------------------------*/
/*  17. GOODSHARE
/*-----------------------------------------------------------------------------------*/
/*
 *  @author Interactive agency «Central marketing» http://centralmarketing.ru
 *  @copyright Copyright (c) 2015, Interactive agency «Central marketing»   
 *  @license http://opensource.org/licenses/MIT The MIT License (MIT)
 *  @version 3.2.4 at 21/11/2015 (14:35)
 *  
 *  goodshare.js
 *  
 *  Useful jQuery plugin that will help your website visitors share a link on social networks and microblogs.
 *  Easy to install and configuring on any of your website!
 *  
 *  @category jQuery plugin
 */
;(function($, window, document, undefined) {
    $(document).ready(function() {
        /*
        *  Variables
        */
        var metaOGDescription = ($('meta[property="og:description"]').attr('content')) ? $('meta[property="og:description"]').attr('content') : '';
        var metaOGImage = ($('meta[property="og:image"]').attr('content')) ? $('meta[property="og:image"]').attr('content') : '';
        /*
        *  Main function
        */
        goodshare = {
            init: function(_element, _options) {
                /*
                 *  Default options:
                 *  
                 *  type = vk
                 *  url = current browser adress stroke
                 *  title = current document <title>
                 *  text = current document <meta property="og:description" ... />
                 *  image = current document <meta property="og:image" ... />
                 */
                var self = goodshare, options = $.extend({
                    type:   'fb',
                    url:    location.href,
                    title:  document.title,
                    text:   metaOGDescription,
                    image:  metaOGImage
                }, $(_element).data(), _options);
                /*
                 *  Open popup
                 */
                if (self.popup(link = self[options.type](options)) !== null) return false;
            },
            /*
             *  Share link > Facebook
             *  @see http://facebook.com
             */
            fb: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title
                }, _options);
                return 'http://www.facebook.com/sharer.php?'
                    + 'u=' + encodeURIComponent(options.url);
            },
            line: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title
                }, _options);
               
                return 'https://social-plugins.line.me/lineit/share?url='+encodeURIComponent(options.url);
                
            },
            /*
             *  Share link > Facebook
             *  @see http://facebook.com
             */
            gplus: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title
                }, _options);
                return 'https://plus.google.com/share?'
                    + 'url=' + encodeURIComponent(options.url);
            },
            /*
             *  Share link > Twitter
             *  @see http://twitter.com
             */
            tw: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title
                }, _options);
                return 'http://twitter.com/share?'
                    + 'url='   + encodeURIComponent(options.url)
                    + '&text=' + encodeURIComponent(options.title);
            },
            /*
             *  Share link > Google Plus
             *  @see http://plus.google.com
             */
            gp: function(_options) {
                var options = $.extend({
                    url:    location.href
                }, _options);
                return 'https://plus.google.com/share?'
                    + 'url=' + encodeURIComponent(options.url);
            },
            /*
             *  Share link > tumblr
             *  @see http://tumblr.com
             */
            tm: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title,
                    text:   metaOGDescription
                }, _options);
                return 'https://www.tumblr.com/widgets/share/tool?'
                    + 'canonicalUrl='   + encodeURIComponent(options.url)
                    + '&title='         + encodeURIComponent(options.title)
                    + '&caption='       + encodeURIComponent(options.text)
                    + '&posttype=link';
            },
            /*
             *  Share link > Pinterest
             *  @see http://www.pinterest.com
             */
            pt: function(_options) {
                var options = $.extend({
                    url:    location.href,
                    title:  document.title,
                    image:  $('meta[property="og:image"]').attr('content')
                }, _options);
                return 'https://www.pinterest.com/pin/create/button/?'
                    + 'url='          + encodeURIComponent(options.url)
                    + '&media='       + encodeURIComponent(options.image)
                    + '&description=' + encodeURIComponent(options.title);
            },          
            /*
             *  Popup window
             */         
            popup: function(url) {
                return window.open(url, '', 'toolbar=0,status=0,scrollbars=0,width=630,height=440');
            }
        };
        /*
         *  Init click.
         */
        $(document).on('click', '.goodshare', function(event) {
            event.preventDefault();
            goodshare.init(this);
        });
    }); 
})(jQuery, window, document);