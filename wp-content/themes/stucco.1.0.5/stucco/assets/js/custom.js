/*
	Stucco by icyNETS
	icynets.com | @icynets
	Free for personal and commercial use under the GNU General Public License (http://www.gnu.org/licenses/gpl-2.0.html).
	
*/
jQuery(document).ready(function ($) {

        new WOW().init();
        
        // Add button to sub-menu parent to show nested pages on the mobile menu
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="fa fa-angle-right"></i></span>' );
        
        // Sub-menu toggle button
        $( '.main-navigation a[href="#"], .menu-dropdown-btn' ).bind( 'click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
            
        });
        
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
        });
        
                
        // Don't search if no keywords have been entered
        $(".search-submit").bind('click', function(event) {
            if ( $(this).parents(".search-form").find(".search-field").val() == "") event.preventDefault();
        });

});