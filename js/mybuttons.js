// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.mylink', {
        init : function(ed, url) {
            ed.addButton('englishversion', {
                title : 'English Version',
                image : url+'/../images/lang_en.png',
                onclick : function() {
                     ed.selection.setContent('<a class="fancybox" href="#">[lang_en]</a> <a class="fancybox" href="#">English Version</a>'/* + ed.selection.getContent() + '[/mylink]'*/);
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('englishversion', tinymce.plugins.mylink);
})();
