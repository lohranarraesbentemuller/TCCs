
<!DOCTYPE html>

    <html  dir="ltr" lang="pt-br" xml:lang="pt-br">
    <head>
        <title>DEC Virtual</title>
		<script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script>

        <link rel="shortcut icon" href="https://virtual.iscp.edu.br/pluginfile.php/1/theme_moove/favicon/1613168191/favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="moodle, DEC Virtual" />
 <link rel="stylesheet" type="text/css" href="https://virtual.iscp.edu.br/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.css" /><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://virtual.iscp.edu.br/theme/styles.php/moove/1613168191_1/all" />
<script type="text/javascript" language="javascript" src="https://www.cfo2019.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function(){
		$('.dz-message').children('span').each(function()
	 {
 
		 
		 ($(this).html("Arraste imagens a serem validadas"));
		 
	 });
	 $('.fa').hover(function(){
		 //alert("aqui");
		 var index=$(this).index();
		 $('.oculto').eq(index ).css("display","block");
		  
		  
	 });
	 $('.fa').mouseout(function(){
		 //alert("la");
		 $('.oculto').css("display","none");
	 });
});

/*
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"https:\/\/virtual.iscp.edu.br","sesskey":"AsGRg0Vypz","sessiontimeout":"28800","themerev":"1613168191","slasharguments":1,"theme":"moove","iconsystemmodule":"core\/icon_system_fontawesome","jsrev":"1613168191","admin":"admin","svgicons":true,"usertimezone":"Am\u00e9rica\/S\u00e3o_Paulo","contextid":2,"langrev":1625814965,"templaterev":"1613168191","developerdebug":true};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin')}};
var yui2ConfigFn = function(me) {var parts=me.name.replace(/^moodle-/,'').split('-'),component=parts.shift(),module=parts[0],min='-min';if(/-(skin|core)$/.test(me.name)){parts.pop();me.type='css';min=''}
if(module){var filename=parts.join('-');me.path=component+'/'+module+'/'+filename+min+'.'+me.type}else{me.path=component+'/'+component+'.'+me.type}};
YUI_config = {"debug":true,"base":"https:\/\/virtual.iscp.edu.br\/lib\/yuilib\/3.17.2\/","comboBase":"https:\/\/virtual.iscp.edu.br\/theme\/yui_combo.php?","combine":true,"filter":"RAW","insertBefore":"firstthemesheet","groups":{"yui2":{"base":"https:\/\/virtual.iscp.edu.br\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"https:\/\/virtual.iscp.edu.br\/theme\/yui_combo.php?","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"https:\/\/virtual.iscp.edu.br\/theme\/yui_combo.php?m\/1613168191\/","combine":true,"comboBase":"https:\/\/virtual.iscp.edu.br\/theme\/yui_combo.php?","ext":false,"root":"m\/1613168191\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"filter":"DEBUG","modules":{"moodle-core-dragdrop":{"requires":["base","node","io","dom","dd","event-key","event-focus","moodle-core-notification"]},"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-notification":{"requires":["moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core-notification-confirm","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core-notification-dialogue":{"requires":["base","node","panel","escape","event-key","dd-plugin","moodle-core-widget-focusafterclose","moodle-core-lockscroll"]},"moodle-core-notification-alert":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-confirm":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-exception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-ajaxexception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-formchangechecker":{"requires":["base","event-focus","moodle-core-event"]},"moodle-core-handlebars":{"condition":{"trigger":"handlebars","when":"after"}},"moodle-core-actionmenu":{"requires":["base","event","node-event-simulate"]},"moodle-core-languninstallconfirm":{"requires":["base","node","moodle-core-notification-confirm","moodle-core-notification-alert"]},"moodle-core-popuphelp":{"requires":["moodle-core-tooltip"]},"moodle-core-tooltip":{"requires":["base","node","io-base","moodle-core-notification-dialogue","json-parse","widget-position","widget-position-align","event-outside","cache-base"]},"moodle-core-event":{"requires":["event-custom"]},"moodle-core-lockscroll":{"requires":["plugin","base-build"]},"moodle-core-maintenancemodetimer":{"requires":["base","node"]},"moodle-core_availability-form":{"requires":["base","node","event","event-delegate","panel","moodle-core-notification-dialogue","json"]},"moodle-backup-backupselectall":{"requires":["node","event","node-event-simulate","anim"]},"moodle-backup-confirmcancel":{"requires":["node","node-event-simulate","moodle-core-notification-confirm"]},"moodle-course-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-course-coursebase","moodle-course-util"]},"moodle-course-management":{"requires":["base","node","io-base","moodle-core-notification-exception","json-parse","dd-constrain","dd-proxy","dd-drop","dd-delegate","node-event-delegate"]},"moodle-course-categoryexpander":{"requires":["node","event-key"]},"moodle-course-formatchooser":{"requires":["base","node","node-event-simulate"]},"moodle-course-util":{"requires":["node"],"use":["moodle-course-util-base"],"submodules":{"moodle-course-util-base":{},"moodle-course-util-section":{"requires":["node","moodle-course-util-base"]},"moodle-course-util-cm":{"requires":["node","moodle-course-util-base"]}}},"moodle-form-shortforms":{"requires":["node","base","selector-css3","moodle-core-event"]},"moodle-form-passwordunmask":{"requires":[]},"moodle-form-dateselector":{"requires":["base","node","overlay","calendar"]},"moodle-question-searchform":{"requires":["base","node"]},"moodle-question-preview":{"requires":["base","dom","event-delegate","event-key","core_question_engine"]},"moodle-question-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-availability_completion-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_date-form":{"requires":["base","node","event","io","moodle-core_availability-form"]},"moodle-availability_grade-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_group-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_grouping-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_profile-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-mod_assign-history":{"requires":["node","transition"]},"moodle-mod_bigbluebuttonbn-modform":{"requires":["base","node"]},"moodle-mod_bigbluebuttonbn-rooms":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_bigbluebuttonbn-imports":{"requires":["base","node"]},"moodle-mod_bigbluebuttonbn-broker":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_bigbluebuttonbn-recordings":{"requires":["base","node","datasource-get","datasource-jsonschema","datasource-polling","moodle-core-notification"]},"moodle-mod_quiz-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-base","moodle-mod_quiz-util-page","moodle-mod_quiz-util-slot","moodle-course-util"]},"moodle-mod_quiz-quizbase":{"requires":["base","node"]},"moodle-mod_quiz-modform":{"requires":["base","node","event"]},"moodle-mod_quiz-toolboxes":{"requires":["base","node","event","event-key","io","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-slot","moodle-core-notification-ajaxexception"]},"moodle-mod_quiz-util":{"requires":["node","moodle-core-actionmenu"],"use":["moodle-mod_quiz-util-base"],"submodules":{"moodle-mod_quiz-util-base":{},"moodle-mod_quiz-util-slot":{"requires":["node","moodle-mod_quiz-util-base"]},"moodle-mod_quiz-util-page":{"requires":["node","moodle-mod_quiz-util-base"]}}},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-mod_quiz-questionchooser":{"requires":["moodle-core-chooserdialogue","moodle-mod_quiz-util","querystring-parse"]},"moodle-message_airnotifier-toolboxes":{"requires":["base","node","io"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-event","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-filter_mathjaxloader-loader":{"requires":["moodle-core-event"]},"moodle-editor_atto-rangy":{"requires":[]},"moodle-editor_atto-editor":{"requires":["node","transition","io","overlay","escape","event","event-simulate","event-custom","node-event-html5","node-event-simulate","yui-throttle","moodle-core-notification-dialogue","moodle-core-notification-confirm","moodle-editor_atto-rangy","handlebars","timers","querystring-stringify"]},"moodle-editor_atto-plugin":{"requires":["node","base","escape","event","event-outside","handlebars","event-custom","timers","moodle-editor_atto-menu"]},"moodle-editor_atto-menu":{"requires":["moodle-core-notification-dialogue","node","event","event-custom"]},"moodle-format_grid-gridkeys":{"requires":["event-nav-keys"]},"moodle-report_eventlist-eventfilter":{"requires":["base","event","node","node-event-delegate","datatable","autocomplete","autocomplete-filters"]},"moodle-report_loglive-fetchlogs":{"requires":["base","event","node","io","node-event-delegate"]},"moodle-gradereport_grader-gradereporttable":{"requires":["base","node","event","handlebars","overlay","event-hover"]},"moodle-gradereport_history-userselector":{"requires":["escape","event-delegate","event-key","handlebars","io-base","json-parse","moodle-core-notification-dialogue"]},"moodle-tool_capability-search":{"requires":["base","node"]},"moodle-tool_lp-dragdrop-reorder":{"requires":["moodle-core-dragdrop"]},"moodle-tool_monitor-dropdown":{"requires":["base","event","node"]},"moodle-assignfeedback_editpdf-editor":{"requires":["base","event","node","io","graphics","json","event-move","event-resize","transition","querystring-stringify-simple","moodle-core-notification-dialog","moodle-core-notification-alert","moodle-core-notification-warning","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-atto_accessibilitychecker-button":{"requires":["color-base","moodle-editor_atto-plugin"]},"moodle-atto_accessibilityhelper-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_align-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bold-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_charmap-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_clear-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_collapse-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emojipicker-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emoticon-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_equation-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_h5p-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_html-codemirror":{"requires":["moodle-atto_html-codemirror-skin"]},"moodle-atto_html-button":{"requires":["promise","moodle-editor_atto-plugin","moodle-atto_html-beautify","moodle-atto_html-codemirror","event-valuechange"]},"moodle-atto_html-beautify":{},"moodle-atto_image-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_indent-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_italic-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_link-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-usedfiles":{"requires":["node","escape"]},"moodle-atto_managefiles-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_media-button":{"requires":["moodle-editor_atto-plugin","moodle-form-shortforms"]},"moodle-atto_noautolink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_orderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_recordrtc-button":{"requires":["moodle-editor_atto-plugin","moodle-atto_recordrtc-recording"]},"moodle-atto_recordrtc-recording":{"requires":["moodle-atto_recordrtc-button"]},"moodle-atto_rtl-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_strike-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_subscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_superscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_table-button":{"requires":["moodle-editor_atto-plugin","moodle-editor_atto-menu","event","event-valuechange"]},"moodle-atto_title-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_underline-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_undo-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_unorderedlist-button":{"requires":["moodle-editor_atto-plugin"]}}},"gallery":{"name":"gallery","base":"https:\/\/virtual.iscp.edu.br\/lib\/yuilib\/gallery\/","combine":true,"comboBase":"https:\/\/virtual.iscp.edu.br\/theme\/yui_combo.php?","ext":false,"root":"gallery\/1613168191\/","patterns":{"gallery-":{"group":"gallery"}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"https:\/\/virtual.iscp.edu.br\/lib\/javascript.php\/1613168191\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker","moodle-core-notification-dialogue"]},"core_comment":{"name":"core_comment","fullpath":"https:\/\/virtual.iscp.edu.br\/lib\/javascript.php\/1613168191\/comment\/comment.js","requires":["base","io-base","node","json","yui2-animation","overlay","escape"]},"mathjax":{"name":"mathjax","fullpath":"https:\/\/cdn.jsdelivr.net\/npm\/mathjax@2.7.8\/MathJax.js?delayStartupUntil=configured"}}};
M.yui.loader = {modules: {}};

//]]>
*/
</script>

<meta name="theme-color" content="#000066">
<meta name="msapplication-navbutton-color" content="#000066">
<meta name="apple-mobile-web-app-status-bar-style" content="#000066">
<!-- Google Tag Manager -->
<script>
/*
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTFHVMK');</script>
<!-- End Google Tag Manager --> */<script> /*
                                    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};
                                    ga.l=+new Date;ga('create', 'UA-113364357-1', 'auto');
                                    ga('send', 'pageview');  */
                                </script>
                                <script async src='https://www.google-analytics.com/analytics.js'></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    </head>
    
    <body  id="page-site-index" class="format-site course path-site chrome dir-ltr lang-pt_br yui-skin-sam yui3-skin-sam virtual-iscp-edu-br pagelayout-frontpage course-1 context-2 ">
<div class="toast-wrapper mx-auto py-0 fixed-top" role="status" aria-live="polite"></div>
    

<div id="accessibilitybar" class="fixed-top">
    <div class="container">
        <div class="bars">
            <div class="fontsize">
                <span>Tamanho da fonte</span>
                <ul>
                    <li><a class="btn btn-default" data-action="decrease" title="Diminuir o tamanho da fonte" id="fontsize_dec">A-</a></li>
                    <li><a class="btn btn-default" data-action="reset" title="Redefinir o tamanho da fonte" id="fontsize_reset">A</a></li>
                    <li><a class="btn btn-default" data-action="increase" title="Aumentar o tamanho da fonte" id="fontsize_inc">A+</a></li>
                </ul>
            </div>
            <div class="sitecolor">
                <span>Cor do site</span>
                <ul>
                    <li><a class="btn btn-default" data-action="reset" title="Redefinir a cor do site" id="sitecolor_color1">R</a></li>
                    <li><a class="btn btn-default" data-action="sitecolor-color-2" title="Baixo contraste 1" id="sitecolor_color2">A</a></li>
                    <li><a class="btn btn-default" data-action="sitecolor-color-3" title="Baixo contraste 2" id="sitecolor_color3">A</a></li>
                    <li><a class="btn btn-default" data-action="sitecolor-color-4" title="Alto contraste" id="sitecolor_color4">A</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="fixed-top navbar navbar-light navbar-expand moodle-has-zindex">
        <div data-region="drawer-toggle" class="d-inline-block mr-3 drawer-toggle">
            <button aria-expanded="false" aria-controls="nav-drawer" type="button" class="fa fa-bars btn nav-link float-sm-left mr-1" data-action="toggle-drawer" data-side="left" ><i></i><span class="sr-only">Painel lateral</span></button>
        </div>

    <a href="https://virtual.iscp.edu.br" class="navbar-brand has-logo
            ">
            <span class="logo d-none d-sm-inline">
                <img src="//virtual.iscp.edu.br/pluginfile.php/1/theme_moove/logo/1613168191/DEC_AVA.png" alt="DEC Virtual">
            </span>
    </a>

    <ul class="navbar-nav d-none d-md-flex custom-menus">
        <!-- custom_menu -->
        
        <!-- page_heading_menu -->
        
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <div class="d-none d-lg-block">
            
        </div>

        <li class="nav-item lang-menu">
            <div class="dropdown nav-item">
    <a class="dropdown-toggle nav-link" id="drop-down-60e9bced430a760e9bced404464" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
        <i class="fa fa-globe"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="drop-down-60e9bced430a760e9bced404464">
                <a class="dropdown-item" href="https://virtual.iscp.edu.br/?lang=en" title="English ‎(en)‎">English ‎(en)‎</a>
                <a class="dropdown-item" href="https://virtual.iscp.edu.br/?lang=pt_br" title="Português - Brasil ‎(pt_br)‎">Português - Brasil ‎(pt_br)‎</a>
    </div>
</div>
        </li>

        <div class="popover-region collapsed popover-region-notifications"
    id="nav-notification-popover-container" data-userid="18093"
    data-region="popover-region">
    <div class="popover-region-toggle nav-link icon-no-margin"
        data-region="popover-region-toggle"
        role="button"
        aria-controls="popover-region-container-60e9bced44bd160e9bced404465"
        aria-haspopup="true"
        aria-label="Mostrar janela de notificações sem as novas notificações"
        tabindex="0">
                <i class="fa fa-bell" title="Alternar menu de notificações"></i>
        <div class="count-container hidden" data-region="count-container">0</div>

    </div>
    <div 
        id="popover-region-container-60e9bced44bd160e9bced404465"
        class="popover-region-container"
        data-region="popover-region-container"
        aria-expanded="false"
        aria-hidden="true"
        aria-label="Janela de notificação"
        role="region">
        <div class="popover-region-header-container">
            <h3 class="popover-region-header-text" data-region="popover-region-header-text">Notificações</h3>
            <div class="popover-region-header-actions" data-region="popover-region-header-actions">        <div class="hover-tooltip-container">
                    <a class="mark-all-read-button"
                    href="#"
                    title="Marcar tudo como lido"
                    data-action="mark-all-read"
                    role="button">
                    <span class="normal-icon"><i class="fa fa-check" alt="Marcar tudo como lido"></i></span>
                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                </a>

    <div class="hover-tooltip">
        Marcar tudo como lido
    </div>
</div>
        <div class="hover-tooltip-container">
                    <a href="https://virtual.iscp.edu.br/message/notificationpreferences.php?userid=18093"
                    title="Preferências de notificação">
                    <i class="fa fa-cog" alt="Preferências de notificação"></i>
                </a>

    <div class="hover-tooltip">
        Preferências de notificação
    </div>
</div>
</div>
        </div>
        <div class="popover-region-content-container" data-region="popover-region-content-container">
            <div class="popover-region-content" data-region="popover-region-content">
                        <div class="all-notifications"
            data-region="all-notifications"
            role="log"
            aria-busy="false"
            aria-atomic="false"
            aria-relevant="additions"></div>
        <div class="empty-message" tabindex="0" data-region="empty-message">Você não tem nenhuma notificação</div>

            </div>
            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
        </div>
                <a class="see-all-link"
                    href="https://virtual.iscp.edu.br/message/output/popup/notifications.php">
                    <div class="popover-region-footer-container">
                        <div class="popover-region-seeall-text">Mostrar todos</div>
                    </div>
                </a>
    </div>
</div><div class="popover-region collapsed" data-region="popover-region-messages">
    <a id="message-drawer-toggle-60e9bced4667b60e9bced404466" class="nav-link d-inline-block popover-region-toggle position-relative icon-no-margin" href="#"
            role="button">
        <i class="icon fa fa-comments-o fa-fw "  title="Alternar menu de mensagens" aria-label="Alternar menu de mensagens"></i>
        <div class="count-container hidden" data-region="count-container"
        aria-label="Há 0 conversas não lidas">0</div>
    </a>
    <span class="sr-only sr-only-focusable" data-region="jumpto" tabindex="-1"></span></div>

        <li class="usermenu"><div class="action-menu moodle-actionmenu nowrap-items d-inline" id="action-menu-1" data-enhance="moodle-core-actionmenu">

        <div class="menubar d-flex " id="action-menu-1-menubar" role="menubar">

            


                <div class="action-menu-trigger">
                    <div class="dropdown">
                        <a href="#" tabindex="0" class="d-inline-block  dropdown-toggle icon-no-margin" id="action-menu-toggle-1" aria-label="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="action-menu-1-menu">
                            
                            <span class="userbutton"><span class="usertext"></span><span class="avatars"><span class="avatar current"><img src="https://virtual.iscp.edu.br/theme/image.php/moove/core/1613168191/u/f2" class="userpicture defaultuserpic" width="35" height="35" alt="" /></span></span></span>
                                
                            <b class="caret"></b>
                        </a>
                            <div class="dropdown-menu dropdown-menu-right menu  align-tr-br" id="action-menu-1-menu" data-rel="menu-content" aria-labelledby="action-menu-toggle-1" role="menu" data-align="tr-br">
                                                                <a href="https://virtual.iscp.edu.br/user/profile.php?id=18093" class="dropdown-item text-username menu-action" role="menuitem" aria-labelledby="actionmenuaction-1">
                                <i class="icon fa slicon-user fa-fw "  title="LOHRAN BENTEMULLER" aria-label="LOHRAN BENTEMULLER"></i>
                                <span class="menu-action-text" id="actionmenuaction-1">Usuário</span>
                        </a>
                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                                                <a href="https://virtual.iscp.edu.br/my/" class="dropdown-item menu-action" role="menuitem" data-title="mymoodle,admin" aria-labelledby="actionmenuaction-2">
                                <i class="icon fa slicon-speedometer fa-fw "  title="Painel" aria-label="Painel"></i>
                                <span class="menu-action-text" id="actionmenuaction-2">Painel</span>
                        </a>
                                                                <a href="https://virtual.iscp.edu.br/user/profile.php?id=18093" class="dropdown-item menu-action" role="menuitem" data-title="profile,moodle" aria-labelledby="actionmenuaction-3">
                                <i class="icon fa slicon-user fa-fw "  title="Perfil" aria-label="Perfil"></i>
                                <span class="menu-action-text" id="actionmenuaction-3">Perfil</span>
                        </a>
                                                                <a href="https://virtual.iscp.edu.br/grade/report/overview/index.php" class="dropdown-item menu-action" role="menuitem" data-title="grades,grades" aria-labelledby="actionmenuaction-4">
                                <i class="icon fa slicon-book-open fa-fw "  title="Notas" aria-label="Notas"></i>
                                <span class="menu-action-text" id="actionmenuaction-4">Notas</span>
                        </a>
                                                                <a href="https://virtual.iscp.edu.br/message/index.php" class="dropdown-item menu-action" role="menuitem" data-title="messages,message" aria-labelledby="actionmenuaction-5">
                                <i class="icon fa slicon-bubble fa-fw "  title="Mensagens" aria-label="Mensagens"></i>
                                <span class="menu-action-text" id="actionmenuaction-5">Mensagens</span>
                        </a>
                                                                <a href="https://virtual.iscp.edu.br/user/preferences.php" class="dropdown-item menu-action" role="menuitem" data-title="preferences,moodle" aria-labelledby="actionmenuaction-6">
                                <i class="icon fa slicon-wrench fa-fw "  title="Preferências" aria-label="Preferências"></i>
                                <span class="menu-action-text" id="actionmenuaction-6">Preferências</span>
                        </a>
                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                                                <a href="https://virtual.iscp.edu.br/login/logout.php?sesskey=AsGRg0Vypz" class="dropdown-item menu-action" role="menuitem" data-title="logout,moodle" aria-labelledby="actionmenuaction-7">
                                <i class="icon fa slicon-logout fa-fw "  title="Sair" aria-label="Sair"></i>
                                <span class="menu-action-text" id="actionmenuaction-7">Sair</span>
                        </a>
                            </div>
                    </div>
                </div>

        </div>

</div></li>
    </ul>
</nav>
    
    <div id="page-wrapper">
    
        <div>
    <a class="sr-only sr-only-focusable" href="#maincontent">Ir para o conteúdo principal</a>
</div><script src="https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/babel-polyfill/polyfill.min.js"></script>
<script src="https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/polyfills/polyfill.js"></script>
<script src="https://virtual.iscp.edu.br/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.js"></script><script src="https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/javascript-static.js"></script>
<script>
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFHVMK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="page" class="container-fluid d-print-block">


        <header id="page-header" class="row">
    <div class="col-12 pt-3 pb-3">
        <div class="card ">
            <div class="card-body ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <div class="page-context-header"><div class="page-header-headings"><h1>DEC Virtual</h1></div></div>
                    </div>

                    <div class="header-actions-container flex-shrink-0" data-region="header-actions-container">
                    </div>
                </div>
                <div class="d-flex flex-wrap">
                    <div class="ml-auto d-flex">
                        
                    </div>
                    <div id="course-header">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

        <div id="page-content" class="row pb-3 d-print-block">
            <div id="region-main-box" class="col-12">
                <section id="region-main">
                    <div class="card">
                        <div class="card-body">
                            <span class="notifications" id="user-notifications"></span>
                            <div role="main"><span id="maincontent"></span><a class="skip-block skip aabtn" href="#skipcategories">Pular categorias de cursos</a>
							
							<div id="frontpage-category-names"><h2>Manual de Identificação Veicular</h2>
							  <div class="course_category_tree clearfix frontpage-category-names">
							      <div class="content">
								    <div class="subcategories">
									   <div class="category loaded" data-categoryid="25" data-depth="1" data-showcourses="5" data-type="0">
									      <div class="info"><h3 class="categoryname aabtn">
										  <a href="./veiculos.php">Onde Localizar Sinais Identificadores</a>
										   </h3>
										   </div>
										</div>
									 </div>
									   <div class="category loaded" data-categoryid="25" data-depth="1" data-showcourses="5" data-type="0">
									      <div class="info"><h3 class="categoryname aabtn">
										  <a href="https://virtual.iscp.edu.br/course/index.php?categoryid=25">Principais Adulterações em Sinais Identificadores</a>
										   </h3>
										   </div>
										</div>
									 
									</div>
                               </div>
                             </div>							   
								
							<BR><BR>
							
							<div id="frontpage-category-names"><h2>Categorias de Cursos</h2><div class="course_category_tree clearfix frontpage-category-names"><div class="collapsible-actions"><a class="collapseexpand aabtn" href="#">Expandir tudo</a></div><div class="content"><div class="subcategories"><div class="category loaded" data-categoryid="25" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=25">Cursos de Formação</a><span title="Número de cursos" class="numberofcourse"> (4)</span></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="27" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=27">Cursos de Aperfeiçoamento</a><span title="Número de cursos" class="numberofcourse"> (2)</span></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="26" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=26">Cursos de Altos Estudos</a><span title="Número de cursos" class="numberofcourse"> (1)</span></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="29" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=29">Instruções Policiais Militares</a><span title="Número de cursos" class="numberofcourse"> (15)</span></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="28" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=28">Cursos de Especialização</a></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="30" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=30">Cursos Superiores</a><span title="Número de cursos" class="numberofcourse"> (2)</span></h3></div><div class="content"></div></div><div class="category loaded" data-categoryid="31" data-depth="1" data-showcourses="5" data-type="0"><div class="info"><h3 class="categoryname aabtn"><a href="https://virtual.iscp.edu.br/course/index.php?categoryid=31">SandBox</a><span title="Número de cursos" class="numberofcourse"> (3)</span></h3></div><div class="content"></div></div></div></div></div></div><span class="skip-block-to" id="skipcategories"></span><br /><a class="skip-block skip aabtn" href="#skipmycourses">Pular meus cursos</a><div id="frontpage-course-list"><h2>Meus cursos</h2><div class="courses frontpage-course-list-enrolled"><div class="card-deck mt-2"><div class="card" data-courseid="13" data-type="1"><a href="https://virtual.iscp.edu.br/course/view.php?id=13"><img src="https://virtual.iscp.edu.br/pluginfile.php/33001/course/overviewfiles/CVPM-2019.jpg" alt="Condutor de Veículo Policial Militar" class="card-img-top w-100" /></a><div class="card-body"><div class="coursecat badge badge-info"><a class="text-white" href="https://virtual.iscp.edu.br/course/index.php?categoryid=29">Instruções Policiais Militares</a></div><h4 class="card-title"><a class="" href="https://virtual.iscp.edu.br/course/view.php?id=13">Condutor de Veículo Policial Militar</a></h4></div><div class="card-footer"><div class="pull-right"><a class="card-link btn btn-primary" href="https://virtual.iscp.edu.br/course/view.php?id=13">Acesso</a></div></div></div><div class="card" data-courseid="41" data-type="1"><a href="https://virtual.iscp.edu.br/course/view.php?id=41"><img src="https://virtual.iscp.edu.br/pluginfile.php/96235/course/overviewfiles/Banner-Entrada-CFO-23Turma.jpg" alt="Curso de Formação de Oficiais 23ª Turma" class="card-img-top w-100" /></a><div class="card-body"><div class="coursecat badge badge-info"><a class="text-white" href="https://virtual.iscp.edu.br/course/index.php?categoryid=25">Cursos de Formação</a></div><h4 class="card-title"><a class="" href="https://virtual.iscp.edu.br/course/view.php?id=41">Curso de Formação de Oficiais 23ª Turma</a></h4></div><div class="card-footer"><div class="pull-right"><a class="card-link btn btn-primary" href="https://virtual.iscp.edu.br/course/view.php?id=41">Acesso</a></div></div></div><div class="card" data-courseid="53" data-type="1"><a href="https://virtual.iscp.edu.br/course/view.php?id=53"><img src="https://virtual.iscp.edu.br/pluginfile.php/114230/course/overviewfiles/Abuso%20Autoridade1.jpg" alt="Instrução de Atualização da Lei de Abuso de Autoridade" class="card-img-top w-100" /></a><div class="card-body"><div class="coursecat badge badge-info"><a class="text-white" href="https://virtual.iscp.edu.br/course/index.php?categoryid=29">Instruções Policiais Militares</a></div><h4 class="card-title"><a class="" href="https://virtual.iscp.edu.br/course/view.php?id=53">Instrução de Atualização da Lei de Abuso de Autoridade</a></h4></div><div class="card-footer"><div class="pull-right"><a class="card-link btn btn-primary" href="https://virtual.iscp.edu.br/course/view.php?id=53">Acesso</a></div></div></div><div class="card" data-courseid="98" data-type="1"><a href="https://virtual.iscp.edu.br/course/view.php?id=98"><img src="https://virtual.iscp.edu.br/pluginfile.php/157598/course/overviewfiles/GIF%20CZP10.gif" alt="Instrução Policial Militar de Adaptação às Pistolas CZ P-10 Calibre 9x19mm" class="card-img-top w-100" /></a><div class="card-body"><div class="coursecat badge badge-info"><a class="text-white" href="https://virtual.iscp.edu.br/course/index.php?categoryid=29">Instruções Policiais Militares</a></div><h4 class="card-title"><a class="" href="https://virtual.iscp.edu.br/course/view.php?id=98">Instrução Policial Militar de Adaptação às Pistolas CZ P-10 Calibre 9x19mm</a></h4></div><div class="card-footer"><div class="pull-right"><a class="card-link btn btn-primary" href="https://virtual.iscp.edu.br/course/view.php?id=98">Acesso</a></div></div></div></div><div class="card-deck mt-2"></div><div class="paging paging-morelink"><a href="https://virtual.iscp.edu.br/course/index.php">Todos os cursos</a></div></div></div><span class="skip-block-to" id="skipmycourses"></span><br /></div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    
        <div
    id="drawer-60e9bced4a74f60e9bced4044616"
    class=" drawer bg-white hidden"
    aria-expanded="false"
    aria-hidden="true"
    data-region="right-hand-drawer"
    role="region"
    tabindex="0"
>
            <div id="message-drawer-60e9bced4a74f60e9bced4044616" class="message-app" data-region="message-drawer" role="region">
            <div class="closewidget bg-light border-bottom text-right">
                <a class="text-dark" data-action="closedrawer" href="#"
                   title="Fechar" aria-label="Fechar"
                >
                    <i class="icon fa fa-window-close fa-fw "   ></i>
                </a>
            </div>
            <div class="header-container position-relative" data-region="header-container">
                <div class="hidden border-bottom px-2 py-3" aria-hidden="true" data-region="view-contacts">
                    <div class="d-flex align-items-center">
                        <div class="align-self-stretch">
                            <a class="h-100 d-flex align-items-center mr-2" href="#" data-route-back role="button">
                                <div class="icon-back-in-drawer">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                    <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                </div>
                                <div class="icon-back-in-app">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                                </div>                            </a>
                        </div>
                        <div>
                            Contatos
                        </div>
                        <div class="ml-auto">
                            <a href="#" data-route="view-search" role="button" aria-label="Pesquisar">
                                <i class="icon fa fa-search fa-fw "   ></i>
                            </a>
                        </div>
                    </div>
                </div>                
                <div
                    class="hidden bg-white position-relative border-bottom p-1 p-sm-2"
                    aria-hidden="true"
                    data-region="view-conversation"
                >
                    <div class="hidden" data-region="header-content"></div>
                    <div class="hidden" data-region="header-edit-mode">
                        
                        <div class="d-flex p-2 align-items-center">
                            Mensagens selecionadas:
                            <span class="ml-1" data-region="message-selected-court">1</span>
                            <button type="button" class="ml-auto close" aria-label="Cancelar seleção de mensagem"
                                data-action="cancel-edit-mode">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div data-region="header-placeholder">
                        <div class="d-flex">
                            <div
                                class="ml-2 rounded-circle bg-pulse-grey align-self-center"
                                style="height: 38px; width: 38px"
                            >
                            </div>
                            <div class="ml-2 " style="flex: 1">
                                <div
                                    class="mt-1 bg-pulse-grey w-75"
                                    style="height: 16px;"
                                >
                                </div>
                            </div>
                            <div
                                class="ml-2 bg-pulse-grey align-self-center"
                                style="height: 16px; width: 20px"
                            >
                            </div>
                        </div>
                    </div>
                    <div
                        class="hidden position-absolute"
                        data-region="confirm-dialogue-container"
                        style="top: 0; bottom: -1px; right: 0; left: 0; background: rgba(0,0,0,0.3);"
                    ></div>
                </div>                <div class="border-bottom  p-1 px-sm-2 py-sm-3" aria-hidden="false"  data-region="view-overview">
                    <div class="d-flex align-items-center">
                        <div class="input-group simplesearchform">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Pesquisar"
                                aria-label="Pesquisar"
                                data-region="view-overview-search-input"
                            >
                            <div class="input-group-append">
                                <span class="icon-no-margin btn btn-submit">
                                    <i class="icon fa fa-search fa-fw "   ></i>
                                </span>
                            </div>
                        </div>
                        <div class="ml-2">
                            <a
                                href="#"
                                data-route="view-settings"
                                data-route-param="18093"
                                aria-label="Preferências"
                                role="button"
                            >
                                <i class="icon fa fa-cog fa-fw "   ></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-right mt-sm-3">
                        <a href="#" data-route="view-contacts" role="button">
                            <i class="icon fa slicon-user fa-fw "   ></i>
                            Contatos
                            <span class="badge badge-primary bg-primary ml-2 hidden"
                            data-region="contact-request-count"
                            aria-label="Há 0 solicitações de contato">
                                0
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="hidden border-bottom px-2 py-3 view-search"  aria-hidden="true" data-region="view-search">
                    <div class="d-flex align-items-center">
                        <a
                            class="mr-2 align-self-stretch d-flex align-items-center"
                            href="#"
                            data-route-back
                            data-action="cancel-search"
                            role="button"
                        >
                            <div class="icon-back-in-drawer">
                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                            </div>
                            <div class="icon-back-in-app">
                                <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                            </div>                        </a>
                        <div class="input-group simplesearchform">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Pesquisar"
                                aria-label="Pesquisar"
                                data-region="search-input"
                            >
                            <div class="input-group-append">
                                <button
                                    class="btn btn-submit icon-no-margin"
                                    type="button"
                                    data-action="search"
                                    aria-label="Pesquisar"
                                >
                                    <span data-region="search-icon-container">
                                        <i class="icon fa fa-search fa-fw "   ></i>
                                    </span>
                                    <span class="hidden" data-region="loading-icon-container">
                                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="hidden border-bottom px-2 py-3" aria-hidden="true" data-region="view-settings">
                    <div class="d-flex align-items-center">
                        <div class="align-self-stretch" >
                            <a class="h-100 d-flex mr-2 align-items-center" href="#" data-route-back role="button">
                                <div class="icon-back-in-drawer">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                    <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                </div>
                                <div class="icon-back-in-app">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                                </div>                            </a>
                        </div>
                        <div>
                            Configurações
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container position-relative" data-region="body-container">
                
                <div
                    class="hidden"
                    data-region="view-contact"
                    aria-hidden="true"
                >
                    <div class="p-2 pt-3" data-region="content-container"></div>
                </div>                <div class="hidden h-100" data-region="view-contacts" aria-hidden="true" data-user-id="18093">
                    <div class="d-flex flex-column h-100">
                        <div class="p-3 border-bottom">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a
                                        id="contacts-tab-60e9bced4a74f60e9bced4044616"
                                        class="nav-link active"
                                        href="#contacts-tab-panel-60e9bced4a74f60e9bced4044616"
                                        data-toggle="tab"
                                        data-action="show-contacts-section"
                                        role="tab"
                                        aria-controls="contacts-tab-panel-60e9bced4a74f60e9bced4044616"
                                        aria-selected="true"
                                    >
                                        Contatos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        id="requests-tab-60e9bced4a74f60e9bced4044616"
                                        class="nav-link"
                                        href="#requests-tab-panel-60e9bced4a74f60e9bced4044616"
                                        data-toggle="tab"
                                        data-action="show-requests-section"
                                        role="tab"
                                        aria-controls="requests-tab-panel-60e9bced4a74f60e9bced4044616"
                                        aria-selected="false"
                                    >
                                        Solicitações
                                        <span class="badge badge-primary bg-primary ml-2 hidden"
                                        data-region="contact-request-count"
                                        aria-label="Há 0 solicitações de contato">
                                            0
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content d-flex flex-column h-100">
                                            <div
                    class="tab-pane fade show active h-100 lazy-load-list"
                    aria-live="polite"
                    data-region="lazy-load-list"
                    data-user-id="18093"
                                        id="contacts-tab-panel-60e9bced4a74f60e9bced4044616"
                    data-section="contacts"
                    role="tabpanel"
                    aria-labelledby="contacts-tab-60e9bced4a74f60e9bced4044616"

                >
                    
                    <div class="hidden text-center p-2" data-region="empty-message-container">
                        Sem contatos
                    </div>
                    <div class="hidden list-group" data-region="content-container">
                        
                    </div>
                    <div class="list-group" data-region="placeholder-container">
                        
                    </div>
                    <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                    </div>
                </div>
                
                                            <div
                    class="tab-pane fade h-100 lazy-load-list"
                    aria-live="polite"
                    data-region="lazy-load-list"
                    data-user-id="18093"
                                        id="requests-tab-panel-60e9bced4a74f60e9bced4044616"
                    data-section="requests"
                    role="tabpanel"
                    aria-labelledby="requests-tab-60e9bced4a74f60e9bced4044616"

                >
                    
                    <div class="hidden text-center p-2" data-region="empty-message-container">
                        Sem solicitações de contatos
                    </div>
                    <div class="hidden list-group" data-region="content-container">
                        
                    </div>
                    <div class="list-group" data-region="placeholder-container">
                        
                    </div>
                    <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                    </div>
                </div>
                        </div>
                    </div>
                </div>                
                <div
                    class="view-conversation hidden h-100"
                    aria-hidden="true"
                    data-region="view-conversation"
                    data-user-id="18093"
                    data-midnight="1625886000"
                    data-message-poll-min="10"
                    data-message-poll-max="120"
                    data-message-poll-after-max="300"
                    style="overflow-y: auto; overflow-x: hidden"
                >
                    <div class="position-relative h-100" data-region="content-container" style="overflow-y: auto; overflow-x: hidden">
                        <div class="content-message-container hidden h-100 px-2 pt-0" data-region="content-message-container" role="log" style="overflow-y: auto; overflow-x: hidden">
                            <div class="py-3 sticky-top z-index-1 border-bottom text-center hidden" data-region="contact-request-sent-message-container">
                                <p class="m-0">Solicitação de contato enviado</p>
                                <p class="font-italic font-weight-light" data-region="text"></p>
                            </div>
                            <div class="p-3 text-center hidden" data-region="self-conversation-message-container">
                                <p class="m-0">Espaço pessoal</p>
                                <p class="font-italic font-weight-light" data-region="text">Salve rascunhos de mensagens, links, notas etc. para acessar mais tarde.</p>
                           </div>
                            <div class="hidden text-center p-3" data-region="more-messages-loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</div>
                        </div>
                        <div class="p-4 w-100 h-100 hidden position-absolute" data-region="confirm-dialogue-container" style="top: 0; background: rgba(0,0,0,0.3);">
                            
                            <div class="p-3 bg-white" data-region="confirm-dialogue" role="alert">
                                <p class="text-muted" data-region="dialogue-text"></p>
                                <div class="mb-2 custom-control custom-checkbox hidden" data-region="delete-messages-for-all-users-toggle-container">
                                    <input type="checkbox" class="custom-control-input" id="delete-messages-for-all-users" data-region="delete-messages-for-all-users-toggle">
                                    <label class="custom-control-label text-muted" for="delete-messages-for-all-users">
                                        Excluir para mim e para todos os outros
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-block">
                                    <span data-region="dialogue-button-text">Bloco</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-unblock">
                                    <span data-region="dialogue-button-text">Desbloquear</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-remove-contact">
                                    <span data-region="dialogue-button-text">Remover</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-add-contact">
                                    <span data-region="dialogue-button-text">Adicionar</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-delete-selected-messages">
                                    <span data-region="dialogue-button-text">Excluir</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-delete-conversation">
                                    <span data-region="dialogue-button-text">Excluir</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="request-add-contact">
                                    <span data-region="dialogue-button-text">Enviar solicitação de contato</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="accept-contact-request">
                                    <span data-region="dialogue-button-text">Aceitar e adicionar aos contatos</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-secondary btn-block hidden" data-action="decline-contact-request">
                                    <span data-region="dialogue-button-text">Recusar</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block" data-action="okay-confirm">OK</button>
                                <button type="button" class="btn btn-secondary btn-block" data-action="cancel-confirm">Cancelar</button>
                            </div>
                        </div>
                        <div class="px-2 pb-2 pt-0" data-region="content-placeholder">
                            <div class="h-100 d-flex flex-column">
                                <div
                                    class="px-2 pb-2 pt-0 bg-light h-100"
                                    style="overflow-y: auto"
                                >
                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                </div>
                            </div>                        </div>
                    </div>
                </div>
                
                <div
                    class="hidden"
                    aria-hidden="true"
                    data-region="view-group-info"
                >
                    <div
                        class="pt-3 h-100 d-flex flex-column"
                        data-region="group-info-content-container"
                        style="overflow-y: auto"
                    ></div>
                </div>                <div class="h-100 view-overview-body" aria-hidden="false" data-region="view-overview"  data-user-id="18093">
                    <div id="message-drawer-view-overview-container-60e9bced4a74f60e9bced4044616" class="d-flex flex-column h-100" style="overflow-y: auto">
                            
                            
                            <div
                                class="section border-0 card"
                                data-region="view-overview-favourites"
                            >
                                <div id="view-overview-favourites-toggle" class="card-header p-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-favourites-target-60e9bced4a74f60e9bced4044616"
                                        aria-expanded="false"
                                        aria-controls="view-overview-favourites-target-60e9bced4a74f60e9bced4044616"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Favoritos</span>
                                        <small class="hidden ml-1" data-region="section-total-count-container"
                                        aria-label=" conversações totais">
                                            (<span data-region="section-total-count"></span>)
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                        </span>
                                        <span class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                        data-region="section-unread-count"
                                        >
                                            
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="18093"
                                            id="view-overview-favourites-target-60e9bced4a74f60e9bced4044616"
            aria-labelledby="view-overview-favourites-toggle"
            data-parent="#message-drawer-view-overview-container-60e9bced4a74f60e9bced4044616"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">Nenhuma conversa favoritada</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div
                                class="section border-0 card"
                                data-region="view-overview-group-messages"
                            >
                                <div id="view-overview-group-messages-toggle" class="card-header p-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-group-messages-target-60e9bced4a74f60e9bced4044616"
                                        aria-expanded="false"
                                        aria-controls="view-overview-group-messages-target-60e9bced4a74f60e9bced4044616"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Grupo</span>
                                        <small class="hidden ml-1" data-region="section-total-count-container"
                                        aria-label=" conversações totais">
                                            (<span data-region="section-total-count"></span>)
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                        </span>
                                        <span class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                        data-region="section-unread-count"
                                        >
                                            
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="18093"
                                            id="view-overview-group-messages-target-60e9bced4a74f60e9bced4044616"
            aria-labelledby="view-overview-group-messages-toggle"
            data-parent="#message-drawer-view-overview-container-60e9bced4a74f60e9bced4044616"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">Nenhuma conversa em grupo</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div
                                class="section border-0 card"
                                data-region="view-overview-messages"
                            >
                                <div id="view-overview-messages-toggle" class="card-header p-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-messages-target-60e9bced4a74f60e9bced4044616"
                                        aria-expanded="false"
                                        aria-controls="view-overview-messages-target-60e9bced4a74f60e9bced4044616"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Privado</span>
                                        <small class="hidden ml-1" data-region="section-total-count-container"
                                        aria-label=" conversações totais">
                                            (<span data-region="section-total-count"></span>)
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                        </span>
                                        <span class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                        data-region="section-unread-count"
                                        >
                                            
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="18093"
                                            id="view-overview-messages-target-60e9bced4a74f60e9bced4044616"
            aria-labelledby="view-overview-messages-toggle"
            data-parent="#message-drawer-view-overview-container-60e9bced4a74f60e9bced4044616"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">Nenhuma conversa privada</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                
                <div
                    data-region="view-search"
                    aria-hidden="true"
                    class="h-100 hidden"
                    data-user-id="18093"
                    data-users-offset="0"
                    data-messages-offset="0"
                    style="overflow-y: auto"
                    
                >
                    <div class="hidden" data-region="search-results-container" style="overflow-y: auto">
                        
                        <div class="d-flex flex-column">
                            <div class="mb-3 bg-white" data-region="all-contacts-container">
                                <div data-region="contacts-container"  class="pt-2">
                                    <h4 class="h6 px-2">Contatos</h4>
                                    <div class="list-group" data-region="list"></div>
                                </div>
                                <div data-region="non-contacts-container" class="pt-2 border-top">
                                    <h4 class="h6 px-2">Não contatos</h4>
                                    <div class="list-group" data-region="list"></div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-link text-primary" data-action="load-more-users">
                                        <span data-region="button-text">Carregue mais</span>
                                        <span data-region="loading-icon-container" class="hidden"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white" data-region="messages-container">
                                <h4 class="h6 px-2 pt-2">Mensagens</h4>
                                <div class="list-group" data-region="list"></div>
                                <div class="text-right">
                                    <button class="btn btn-link text-primary" data-action="load-more-messages">
                                        <span data-region="button-text">Carregue mais</span>
                                        <span data-region="loading-icon-container" class="hidden"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                    </button>
                                </div>
                            </div>
                            <p class="hidden p-3 text-center" data-region="no-results-container">Nenhum resultado</p>
                        </div>                    </div>
                    <div class="hidden" data-region="loading-placeholder">
                        <div class="text-center pt-3 icon-size-4"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</div>
                    </div>
                    <div class="p-3 text-center" data-region="empty-message-container">
                        <p>Pesquisar pessoas e mensagens</p>
                    </div>
                </div>                
                <div class="h-100 hidden bg-white" aria-hidden="true" data-region="view-settings">
                    <div class="hidden" data-region="content-container">
                        
                        <div data-region="settings" class="p-3">
                            <h3 class="h6 font-weight-bold">Privacidade</h3>
                            <p>Você pode restringir quem pode enviar uma mensagem para você</p>
                            <div data-preference="blocknoncontacts" class="mb-3">
                                <fieldset>
                                    <legend class="sr-only">Aceitar mensagens de:</legend>
                                        <div class="custom-control custom-radio mb-2">
                                            <input
                                                type="radio"
                                                name="message_blocknoncontacts"
                                                class="custom-control-input"
                                                id="block-noncontacts-60e9bced4a74f60e9bced4044616-1"
                                                value="1"
                                            >
                                            <label class="custom-control-label ml-2" for="block-noncontacts-60e9bced4a74f60e9bced4044616-1">
                                                Apenas meus contatos
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input
                                                type="radio"
                                                name="message_blocknoncontacts"
                                                class="custom-control-input"
                                                id="block-noncontacts-60e9bced4a74f60e9bced4044616-0"
                                                value="0"
                                            >
                                            <label class="custom-control-label ml-2" for="block-noncontacts-60e9bced4a74f60e9bced4044616-0">
                                                Meus contatos e qualquer pessoa em meus cursos
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input
                                                type="radio"
                                                name="message_blocknoncontacts"
                                                class="custom-control-input"
                                                id="block-noncontacts-60e9bced4a74f60e9bced4044616-2"
                                                value="2"
                                            >
                                            <label class="custom-control-label ml-2" for="block-noncontacts-60e9bced4a74f60e9bced4044616-2">
                                                Qualquer pessoa no site
                                            </label>
                                        </div>
                                </fieldset>
                            </div>
                        
                            <div class="hidden" data-region="notification-preference-container">
                                <h3 class="mb-2 mt-4 h6 font-weight-bold">Preferências de notificação</h3>
                            </div>
                        
                            <h3 class="mb-2 mt-4 h6 font-weight-bold">Geral</h3>
                            <div data-preference="entertosend">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="enter-to-send-60e9bced4a74f60e9bced4044616" >
                                    <label class="custom-control-label" for="enter-to-send-60e9bced4a74f60e9bced4044616">
                                        Use 'enter' para enviar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-region="placeholder-container">
                        
                        <div class="d-flex flex-column p-3">
                            <div class="w-25 bg-pulse-grey h6" style="height: 18px"></div>
                            <div class="w-75 bg-pulse-grey mb-4" style="height: 18px"></div>
                            <div class="mb-3">
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                            <div class="w-50 bg-pulse-grey h6 mb-3 mt-2" style="height: 18px"></div>
                            <div class="mb-4">
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-25 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-25 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                            <div class="w-25 bg-pulse-grey h6 mb-3 mt-2" style="height: 18px"></div>
                            <div class="mb-3">
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                        </div>                    </div>
                </div>            </div>
            <div class="footer-container position-relative" data-region="footer-container">
                
                <div
                    class="hidden border-top bg-white position-relative"
                    aria-hidden="true"
                    data-region="view-conversation"
                    data-enter-to-send="0"
                >
                    <div class="hidden p-sm-2" data-region="content-messages-footer-container">
                        
                            <div
                                class="emoji-auto-complete-container w-100 hidden"
                                data-region="emoji-auto-complete-container"
                                aria-live="polite"
                                aria-hidden="true"
                            >
                            </div>
                        <div class="d-flex mt-sm-1">
                            <textarea
                                dir="auto"
                                data-region="send-message-txt"
                                class="form-control bg-light"
                                rows="3"
                                data-auto-rows
                                data-min-rows="3"
                                data-max-rows="5"
                                aria-label="Escrever uma mensagem..."
                                placeholder="Escrever uma mensagem..."
                                style="resize: none"
                                maxlength="4096"
                            ></textarea>
                        
                            <div class="position-relative d-flex flex-column">
                                    <div
                                        data-region="emoji-picker-container"
                                        class="emoji-picker-container hidden"
                                        aria-hidden="true"
                                    >
                                        
                                        <div
                                            data-region="emoji-picker"
                                            class="card shadow emoji-picker"
                                        >
                                            <div class="card-header px-1 pt-1 pb-0 d-flex justify-content-between flex-shrink-0">
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button selected"
                                                    data-action="show-category"
                                                    data-category="Recent"
                                                    title="Recente"
                                                >
                                                    <i class="icon fa fa-clock-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Smileys & People"
                                                    title="Smileys e pessoas"
                                                >
                                                    <i class="icon fa fa-smile-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Animals & Nature"
                                                    title="Animais e natureza"
                                                >
                                                    <i class="icon fa fa-leaf fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Food & Drink"
                                                    title="Comidas e bebidas"
                                                >
                                                    <i class="icon fa fa-cutlery fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Travel & Places"
                                                    title="Viagens e lugares"
                                                >
                                                    <i class="icon fa fa-plane fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Activities"
                                                    title="Atividades"
                                                >
                                                    <i class="icon fa fa-futbol-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Objects"
                                                    title="Objetos"
                                                >
                                                    <i class="icon fa fa-lightbulb-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Symbols"
                                                    title="Símbolos"
                                                >
                                                    <i class="icon fa fa-heart fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button"
                                                    data-action="show-category"
                                                    data-category="Flags"
                                                    title="Bandeiras"
                                                >
                                                    <i class="icon fa fa-flag fa-fw "   ></i>
                                                </button>
                                            </div>
                                            <div class="card-body p-2 d-flex flex-column overflow-hidden">
                                                <div class="input-group mb-1 flex-shrink-0">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text pr-0 bg-white text-muted">
                                                            <i class="icon fa fa-search fa-fw "   ></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="text"
                                                        class="form-control border-left-0"
                                                        placeholder="Buscar"
                                                        aria-label="Buscar"
                                                        data-region="search-input"
                                                    >
                                                </div>
                                                <div class="flex-grow-1 overflow-auto emojis-container h-100" data-region="emojis-container">
                                                    <div class="position-relative" data-region="row-container"></div>
                                                </div>
                                                <div class="flex-grow-1 overflow-auto search-results-container h-100 hidden" data-region="search-results-container">
                                                    <div class="position-relative" data-region="row-container"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="card-footer d-flex flex-shrink-0"
                                                data-region="footer"
                                            >
                                                <div class="emoji-preview" data-region="emoji-preview"></div>
                                                <div data-region="emoji-short-name" class="emoji-short-name text-muted text-wrap ml-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-link btn-icon icon-size-3 ml-1"
                                        aria-label="Alternar seletor de emoji"
                                        data-action="toggle-emoji-picker"
                                    >
                                        <i class="icon fa fa-smile-o fa-fw "   ></i>
                                    </button>
                                <button
                                    class="btn btn-link btn-icon icon-size-3 ml-1 mt-auto"
                                    aria-label="Enviar mensagem"
                                    data-action="send-message"
                                >
                                    <span data-region="send-icon-container"><i class="icon fa fa-paper-plane fa-fw "   ></i></span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-sm-2" data-region="content-messages-footer-edit-mode-container">
                        
                        <div class="d-flex p-3 justify-content-end">
                            <button
                                class="btn btn-link btn-icon my-1 icon-size-4"
                                data-action="delete-selected-messages"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Apagar mensagens selecionadas"
                            >
                                <span data-region="icon-container"><i class="icon fa fa-trash fa-fw "   ></i></span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                                <span class="sr-only">Apagar mensagens selecionadas</span>
                            </button>
                        </div>                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-require-contact-container">
                        
                        <div class="p-3 bg-white">
                            <p data-region="title"></p>
                            <p class="text-muted" data-region="text"></p>
                            <button type="button" class="btn btn-primary btn-block" data-action="request-add-contact">
                                <span data-region="dialogue-button-text">Enviar solicitação de contato</span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                            </button>
                        </div>
                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-require-unblock-container">
                        
                        <div class="p-3 bg-white">
                            <p class="text-muted" data-region="text">Você bloqueou este usuário.</p>
                            <button type="button" class="btn btn-primary btn-block" data-action="request-unblock">
                                <span data-region="dialogue-button-text">Desbloquear usuário</span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Carregando" aria-label="Carregando"></i></span>
</span>
                            </button>
                        </div>
                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-unable-to-message">
                        
                        <div class="p-3 bg-white">
                            <p class="text-muted" data-region="text">Você não consegue enviar mensagens para esse usuário</p>
                        </div>
                    </div>
                    <div class="p-sm-2" data-region="placeholder-container">
                        <div class="d-flex">
                            <div class="bg-pulse-grey w-100" style="height: 80px"></div>
                            <div class="mx-2 mb-2 align-self-end bg-pulse-grey" style="height: 20px; width: 20px"></div>
                        </div>                    </div>
                    <div
                        class="hidden position-absolute"
                        data-region="confirm-dialogue-container"
                        style="top: -1px; bottom: 0; right: 0; left: 0; background: rgba(0,0,0,0.3);"
                    ></div>
                </div>                    <div data-region="view-overview" class="text-center">
                        <a href="https://virtual.iscp.edu.br/message/index.php">
                            Mostrar todos
                        </a>
                    </div>
            </div>
        </div>

</div>
    <style>
	.oculto{
	display:none;
	}
	.fa:hover{
		display:block;
	}
	</style>
 
            <div id="nav-drawer" data-region="drawer" class="hidden-print moodle-has-zindex closed" aria-hidden="true" tabindex="-1">
                <ul class="list-group metismenu">
                                <li class="fa fa-home   list-group-item active font-weight-bold" >
                                     
                                        <span class="text oculto">Página inicial</span>
                                    
                                </li>
                                <li class="fa fa-tachometer list-group-item active font-weight-bold" data-key="myhome">
                                   
                                        <span class="text oculto">Painel</span>
                                  
                                </li>
                                <li class="fa fa-calendar list-group-item active font-weight-bold " data-key="calendar">
                                    
                                        <span class="text oculto">Calendário</span>
                                    
                                </li>
                                <li class="fa fa-database list-group-item active font-weight-bold" data-key="certificates">
                                    
                                        <span class="text oculto">Certificados</span>
                                   
                                </li>
                                <li class=" active list-group-item list-group-item-action fa fa-file font-weight-bold " data-key="privatefiles">
                                    
                                        <span class="text oculto">Arquivos privados</span>
                                    
                                </li>
                                <li class=" active list-group-item list-group-item-action fa fa-car font-weight-bold " data-key="privatefiles">
                                    
                                        <span class="text oculto">Identificação Veicular</span>
                                    
                                </li>								
                        
                </ul>            </div>
            
            <div id="nav-drawer-footer">
                <span id="themesettings-control">
                    <i title="Configurações de acessibilidade"
                       class="fa fa-universal-access">
                    </i>
                    <span class="text">Configurações de acessibilidade</span>
                </span>
            </div>
    </div><!-- Ends .page-wrapper -->
    
<div id="top-footer">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-7 contact">
            <h3>Manter contato</h3>
            <h4><center>
<p>POLÍCIA MILITAR DO DISTRITO FEDERAL<br>
DEPARTAMENTO DE EDUCAÇÃO E CULTURA<br>
INSTITUTO SUPERIOR DE CIÊNCIAS POLICIAIS</p>
<p style="font-size: small;">Setor de Áreas Isoladas Sudeste (SAISO) - Área Especial Nº 4 - Setor Policial Sul, Brasília-DF. CEP: 70610-200</p>
</center></h4>
            <ul>
            </ul>
        </div>
        <div class="col-md-5 social">
          <ul>
                <li>
                  <a href="https://facebook.com/iscpvirtual" target="_blank" class="facebook btn">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>



                <li>
                  <a href="https://www.youtube.com/channel/UCniAJqHHz_-N6YfpkfBHHGA" target="_blank" class="youtube btn">
                    <i class="fa fa-youtube"></i>
                  </a>
                </li>

                <li>
                  <a href="https://www.instagram.com/iscpvirtual/" target="_blank" class="instagram btn">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>

          </ul>

          <div class="plugins_standard_footer_html"><div class="tool_dataprivacy mb-2"><a class="btn btn-default" href="https://virtual.iscp.edu.br/admin/tool/dataprivacy/summary.php"><i class='fa fa-folder'></i> Resumo de retenção de dados</a></div><div class="mobilefooter mb-2"><a class="btn btn-primary" href="https://download.moodle.org/mobile?version=2020110901.05&amp;lang=pt_br&amp;iosappid=633359593&amp;androidappid=com.moodle.moodlemobile"><i class='fa fa-mobile'></i> Obter o aplicativo para dispositivos móveis</a></div></div>
        </div>
    </div>
  </div>
</div>
<footer id="page-footer" class="p-y-1">
  <div class="container-fluid">
      <div id="course-footer"></div>

      <div class="madewithmoodle">
          <p>Orgulhosamente feito com</p>
          <a href="https://moodle.org"><img src="https://virtual.iscp.edu.br/theme/moove/pix/moodle-logo-white.png" alt="Moodle logo"></a>
      </div>

      <div class="madeby">
          <p>Feito com <i class="text-danger fa fa-heart"></i> por <a href="http://conecti.me">conecti.me</a></p>
      </div>
  </div>
</footer>


<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script><script>
//<![CDATA[
var require = {
    baseUrl : 'https://virtual.iscp.edu.br/lib/requirejs.php/1613168191/',
    // We only support AMD modules with an explicit define() statement.
    enforceDefine: true,
    skipDataMain: true,
    waitSeconds : 0,

    paths: {
        jquery: 'https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/jquery/jquery-3.4.1.min',
        jqueryui: 'https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/jquery/ui-1.12.1/jquery-ui.min',
        jqueryprivate: 'https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/requirejs/jquery-private'
    },

    // Custom jquery config map.
    map: {
      // '*' means all modules will get 'jqueryprivate'
      // for their 'jquery' dependency.
      '*': { jquery: 'jqueryprivate' },
      // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
      '*': { process: 'core/first' },

      // 'jquery-private' wants the real jQuery module
      // though. If this line was not here, there would
      // be an unresolvable cyclic dependency.
      jqueryprivate: { jquery: 'jquery' }
    }
};

//]]>
</script>
<script src="https://virtual.iscp.edu.br/lib/javascript.php/1613168191/lib/requirejs/require.min.js"></script>
<script> /*
//<![CDATA[
M.util.js_pending("core/first");require(['core/first'], function() {
require(['core/prefetch']);
;
require(["media_videojs/loader"], function(loader) {
    loader.setUp('pt-BR');
});;

require(['jquery', 'core/custom_interaction_events'], function($, CustomEvents) {
    CustomEvents.define('#single_select60e9bced404463', [CustomEvents.events.accessibleChange]);
    $('#single_select60e9bced404463').on(CustomEvents.events.accessibleChange, function() {
        var ignore = $(this).find(':selected').attr('data-ignore');
        if (typeof ignore === typeof undefined) {
            $('#single_select_f60e9bced404462').submit();
        }
    });
});
;

require(['jquery', 'message_popup/notification_popover_controller'], function($, controller) {
    var container = $('#nav-notification-popover-container');
    var controller = new controller(container);
    controller.registerEventListeners();
    controller.registerListNavigationEventListeners();
});
;

require(
[
    'jquery',
    'core_message/message_popover'
],
function(
    $,
    Popover
) {
    var toggle = $('#message-drawer-toggle-60e9bced4667b60e9bced404466');
    Popover.init(toggle);
});
;

require(['jquery', 'core_message/message_drawer'], function($, MessageDrawer) {
    var root = $('#message-drawer-60e9bced4a74f60e9bced4044616');
    MessageDrawer.init(root, '60e9bced4a74f60e9bced4044616', false);
});
;

require(['theme_boost/loader']);

require(['theme_boost/drawer'], function(mod) {
    mod.init();
});

require(['theme_moove/metismenu', 'jquery'], function(metisMenu, $) {
    $(".metismenu").metisMenu();
});

require([], function() {
    var iconsearch = document.querySelector('.moove-search-input .slicon-magnifier');
    var btnclosesearch = document.querySelector('.search-input-form .close-search');
    var searchinputform = document.querySelector('.moove-search-input');

    if (iconsearch) {

        var togglesearchinputform = function() {
            searchinputform.classList.toggle('expanded');
        }

        iconsearch.onclick = togglesearchinputform;
        btnclosesearch.onclick = togglesearchinputform;
    }
});

require(['theme_moove/accessibilitybar'], function(bar) {
    bar.init();
});

require(['theme_moove/themesettings'], function(themesettings) {
    themesettings.init();
});

;
M.util.js_pending('core/notification'); require(['core/notification'], function(amd) {amd.init(2, []); M.util.js_complete('core/notification');});;
M.util.js_pending('core/log'); require(['core/log'], function(amd) {amd.setConfig({"level":"trace"}); M.util.js_complete('core/log');});;
M.util.js_pending('core/page_global'); require(['core/page_global'], function(amd) {amd.init(); M.util.js_complete('core/page_global');});M.util.js_complete("core/first");
});
//]]>
*/
</script>
<script> /*
//<![CDATA[
M.str = {"moodle":{"lastmodified":"\u00daltima atualiza\u00e7\u00e3o","name":"Nome","error":"Erro","info":"Informa\u00e7\u00e3o","yes":"Sim","no":"N\u00e3o","cancel":"Cancelar","collapseall":"Contrair tudo","expandall":"Expandir tudo","confirm":"Confirmar","areyousure":"Voc\u00ea tem certeza?","closebuttontitle":"Fechar","unknownerror":"Erro desconhecido","file":"Arquivo","url":"URL"},"repository":{"type":"Tipo","size":"Tamanho","invalidjson":"palavra JSON inv\u00e1lida","nofilesattached":"Nenhum arquivo anexado","filepicker":"Seletor de arquivos","logout":"Sair","nofilesavailable":"Nenhum arquivo dispon\u00edvel","norepositoriesavailable":"Desculpe, nenhum dos seus reposit\u00f3rios atuais pode retornar arquivos no formato solicitado.","fileexistsdialogheader":"Arquivo existe","fileexistsdialog_editor":"Um arquivo com este nome j\u00e1 foi anexado ao texto que voc\u00ea est\u00e1 editando.","fileexistsdialog_filemanager":"Um arquivo com este nome j\u00e1 foi anexado","renameto":"Renomear para \"{$a}\"","referencesexist":"Existem {$a} links para esse arquivo","select":"Selecione"},"admin":{"confirmdeletecomments":"Voc\u00ea est\u00e1 prestes a excluir coment\u00e1rios, tem certeza?","confirmation":"Confirma\u00e7\u00e3o"},"debug":{"debuginfo":"Informa\u00e7\u00f5es de depura\u00e7\u00e3o","line":"Linha","stacktrace":"Rastreamento de pilha"},"langconfig":{"labelsep":":&nbsp;"}};
//]]> */
</script>
<script> /* 
//<![CDATA[
(function() {Y.use("moodle-filter_mathjaxloader-loader",function() {M.filter_mathjaxloader.configure({"mathjaxconfig":"\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n","lang":"pt-br"});
});
M.util.help_popups.setup(Y);
Y.use("moodle-course-categoryexpander",function() {Y.Moodle.course.categoryexpander.init();
});
 M.util.js_pending('random60e9bced4044617'); Y.on('domready', function() { M.util.js_complete("init");  M.util.js_complete('random60e9bced4044617'); });
})();
//]]> */
</script>

    
    </body>
    </html>