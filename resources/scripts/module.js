TreeViewHandler.prototype.installFullScreen = function() {
    var self = this;
    var $treeTools = self.toolbox.find('ul');
    var $button = $('<li id="tvfs" class="tv_button tvfs-switch-full-screen" title="Toggle FullScreen View"></li>');

    $button.on('click', function(e) {
        self.treeview.parent().toggleClass('tvfs-full-screen');
        self.treeview.closest('.wt-ajax-load').toggleClass('tvfs-full-screen');
    });

    $treeTools.append($button);
};

TreeViewHandler.prototype.setCompleteOriginal = TreeViewHandler.prototype.setComplete;

TreeViewHandler.prototype.setComplete = function() {
    this.setCompleteOriginal();
    this.installFullScreen();
};