TreeViewHandler.prototype.installFullScreen = function() {
    var tv = this;
    var $treeTools = tv.toolbox.find('ul');

    if (!$treeTools.find('li#tvfs').length) {
        var $button = $('<li id="tvfs" class="tv_button tvfs-switch-full-screen" title="Toggle FullScreen View"></li>');

        $button.on('click', function() {
            tv.container.parent().toggleClass('tvfs-full-screen');
            tv.container.closest('.wt-ajax-load').toggleClass('tvfs-full-screen');
        });

        $treeTools.append($button);
    }
};

TreeViewHandler.prototype.setCompleteOriginal = TreeViewHandler.prototype.setComplete;

TreeViewHandler.prototype.setComplete = function() {
    this.setCompleteOriginal();
    this.installFullScreen();
};

$(document).ready(function() {
    if (typeof tvHandler != 'undefined') {
        tvHandler.installFullScreen();
    }
    if (typeof tvTabHandler != 'undefined') {
        tvTabHandler.installFullScreen();
    }
});