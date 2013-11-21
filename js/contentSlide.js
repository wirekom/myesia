// Copyright (c) 2013
var init_hover = function() {

    //caching
    //wrapper of the left items
    var $cn_list = $('#cn_list');
    var $pages = $cn_list.find('.cn_page');
    //how many pages
    var cnt_pages = $pages.length;
    //the default page is the first one
    var page = 1;
    //list of news (left items)
    var $items = $cn_list.find('.cn_item');
    //the current item being viewed (right side)
    var $cn_preview = $('#cn_preview');
    //index of the item being viewed. 
    //the default is the first one
    var current = 1;

    /*
     for each item we store its index relative to all the document.
     we bind a click event that slides up or down the current item
     and slides up or down the clicked one. 
     Moving up or down will depend if the clicked item is after or
     before the current one
     */
    $("div.cn_content").addClass("hid");
    $items.each(function(i) {
        var $item = $(this);
        $item.data('idx', i + 1);

        $item.bind('click', function() {
            var $this = $(this);
            $cn_list.find('.selected').removeClass('selected');
            $this.addClass('selected');
            var idx = $(this).data('idx');
            var $current = $cn_preview.find('.cn_content:nth-child(' + current + ')');
            var $next = $cn_preview.find('.cn_content:nth-child(' + idx + ')');

            if (idx > current) {
                $current.stop().animate({'top': '-300px'}, 600, 'easeOutBack', function() {
                    $(this).css({'top': '310px'});
                });
                $next.css({'top': '310px', 'display': 'block'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
            }
            else if (idx < current) {
                $current.stop().animate({'top': '310px'}, 600, 'easeOutBack', function() {
                    $(this).css({'top': '310px'});
                });
                $next.css({'top': '-300px'}).stop().animate({'top': '5px'}, 600, 'easeOutBack');
            }
            current = idx;
        });
    });

};


