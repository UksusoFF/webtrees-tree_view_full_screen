function tvfsInstall() {
    var $treeView = $('#tvTab_out'),
        $treeTools = $treeView.find('#tv_tools ul');

    if ($treeView.length && !$treeTools.find('li#tvfs').length) {
        var $fullScreenButton = $('<li id="tvfs" class="tv_button tvfs-switch-full-screen" title="Toggle FullScreen View"></li>');

        $fullScreenButton.on('click', function() {
            $treeView.parent().toggleClass('tvfs-full-screen');
        });

        $treeTools.append($fullScreenButton);
    }
}

$(document).bind('ajaxComplete', function(event, xhr, settings) {
    if (settings.url.indexOf('&action=ajax&module=tree') !== -1) {
        tvfsInstall();
    }
});

$('#tabs').on('tabsload', function() {
    tvfsInstall();
});

$('#main').on('show.bs.collapse shown.bs.collapse', function() {
    tvfsInstall();
});