$("#tabs").on("tabsload", function() {
    var $treeView = $('#tvTab_out');

    if ($treeView.length && !$treeView.find('#tv_tools ul li#switch-full-screen').length) {
        var $treeViewToolbox = $treeView.find('#tv_tools ul'),
            $fullScreenButton = $('<li id="switch-full-screen" class="tv_button tvfs-switch-full-screen" title="Toggle FullScreen View"></li>');

        $fullScreenButton.on('click', function() {
            $treeView.parent().toggleClass('tvfs-full-screen');
        });

        $treeViewToolbox.append($fullScreenButton);
    }
});