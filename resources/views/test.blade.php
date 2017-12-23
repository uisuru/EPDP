<link type="text/css" id="dark-mode" rel="stylesheet" href="">
<style type="text/css" id="dark-mode-custom-style"></style>
<head>
    <title>Add Post</title>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0">
    <meta name="csrf-token" content="aS7pVBZM19ZqgKVuyvxmR8AoXv5TFxxquTv85SPE">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/vendor/tcg/voyager/assets/images/logo-icon.png"
          type="image/x-icon">


    <!-- App CSS -->
    <link rel="stylesheet" href="/vendor/tcg/voyager/assets/css/app.css">

    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height: 100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .voyager .side-menu .navbar-header {
            background: #22A7F0;
            border-color: #22A7F0;
        }

        .widget .btn-primary {
            border-color: #22A7F0;
        }

        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus {
            background: #22A7F0;
        }

        .voyager .breadcrumb a {
            color: #22A7F0;
        }
    </style>


    <style id="ace_editor.css">.ace_editor {
            position: relative;
            overflow: hidden;
            font: 12px/normal 'Monaco', 'Menlo', 'Ubuntu Mono', 'Consolas', 'source-code-pro', monospace;
            direction: ltr;
            text-align: left;
        }

        .ace_scroller {
            position: absolute;
            overflow: hidden;
            top: 0;
            bottom: 0;
            background-color: inherit;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: text;
        }

        .ace_content {
            position: absolute;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            min-width: 100%;
        }

        .ace_dragging .ace_scroller:before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            background: rgba(250, 250, 250, 0.01);
            z-index: 1000;
        }

        .ace_dragging.ace_dark .ace_scroller:before {
            background: rgba(0, 0, 0, 0.01);
        }

        .ace_selecting, .ace_selecting * {
            cursor: text !important;
        }

        .ace_gutter {
            position: absolute;
            overflow: hidden;
            width: auto;
            top: 0;
            bottom: 0;
            left: 0;
            cursor: default;
            z-index: 4;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
        }

        .ace_gutter-active-line {
            position: absolute;
            left: 0;
            right: 0;
        }

        .ace_scroller.ace_scroll-left {
            box-shadow: 17px 0 16px -16px rgba(0, 0, 0, 0.4) inset;
        }

        .ace_gutter-cell {
            padding-left: 19px;
            padding-right: 6px;
            background-repeat: no-repeat;
        }

        .ace_gutter-cell.ace_error {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABOFBMVEX/////////QRswFAb/Ui4wFAYwFAYwFAaWGAfDRymzOSH/PxswFAb/SiUwFAYwFAbUPRvjQiDllog5HhHdRybsTi3/Tyv9Tir+Syj/UC3////XurebMBIwFAb/RSHbPx/gUzfdwL3kzMivKBAwFAbbvbnhPx66NhowFAYwFAaZJg8wFAaxKBDZurf/RB6mMxb/SCMwFAYwFAbxQB3+RB4wFAb/Qhy4Oh+4QifbNRcwFAYwFAYwFAb/QRzdNhgwFAYwFAbav7v/Uy7oaE68MBK5LxLewr/r2NXewLswFAaxJw4wFAbkPRy2PyYwFAaxKhLm1tMwFAazPiQwFAaUGAb/QBrfOx3bvrv/VC/maE4wFAbRPBq6MRO8Qynew8Dp2tjfwb0wFAbx6eju5+by6uns4uH9/f36+vr/GkHjAAAAYnRSTlMAGt+64rnWu/bo8eAA4InH3+DwoN7j4eLi4xP99Nfg4+b+/u9B/eDs1MD1mO7+4PHg2MXa347g7vDizMLN4eG+Pv7i5evs/v79yu7S3/DV7/498Yv24eH+4ufQ3Ozu/v7+y13sRqwAAADLSURBVHjaZc/XDsFgGIBhtDrshlitmk2IrbHFqL2pvXf/+78DPokj7+Fz9qpU/9UXJIlhmPaTaQ6QPaz0mm+5gwkgovcV6GZzd5JtCQwgsxoHOvJO15kleRLAnMgHFIESUEPmawB9ngmelTtipwwfASilxOLyiV5UVUyVAfbG0cCPHig+GBkzAENHS0AstVF6bacZIOzgLmxsHbt2OecNgJC83JERmePUYq8ARGkJx6XtFsdddBQgZE2nPR6CICZhawjA4Fb/chv+399kfR+MMMDGOQAAAABJRU5ErkJggg==");
            background-repeat: no-repeat;
            background-position: 2px center;
        }

        .ace_gutter-cell.ace_warning {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAmVBMVEX///8AAAD///8AAAAAAABPSzb/5sAAAAB/blH/73z/ulkAAAAAAAD85pkAAAAAAAACAgP/vGz/rkDerGbGrV7/pkQICAf////e0IsAAAD/oED/qTvhrnUAAAD/yHD/njcAAADuv2r/nz//oTj/p064oGf/zHAAAAA9Nir/tFIAAAD/tlTiuWf/tkIAAACynXEAAAAAAAAtIRW7zBpBAAAAM3RSTlMAABR1m7RXO8Ln31Z36zT+neXe5OzooRDfn+TZ4p3h2hTf4t3k3ucyrN1K5+Xaks52Sfs9CXgrAAAAjklEQVR42o3PbQ+CIBQFYEwboPhSYgoYunIqqLn6/z8uYdH8Vmdnu9vz4WwXgN/xTPRD2+sgOcZjsge/whXZgUaYYvT8QnuJaUrjrHUQreGczuEafQCO/SJTufTbroWsPgsllVhq3wJEk2jUSzX3CUEDJC84707djRc5MTAQxoLgupWRwW6UB5fS++NV8AbOZgnsC7BpEAAAAABJRU5ErkJggg==");
            background-position: 2px center;
        }

        .ace_gutter-cell.ace_info {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAJ0Uk5TAAB2k804AAAAPklEQVQY02NgIB68QuO3tiLznjAwpKTgNyDbMegwisCHZUETUZV0ZqOquBpXj2rtnpSJT1AEnnRmL2OgGgAAIKkRQap2htgAAAAASUVORK5CYII=");
            background-position: 2px center;
        }

        .ace_dark .ace_gutter-cell.ace_info {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJFBMVEUAAAChoaGAgIAqKiq+vr6tra1ZWVmUlJSbm5s8PDxubm56enrdgzg3AAAAAXRSTlMAQObYZgAAAClJREFUeNpjYMAPdsMYHegyJZFQBlsUlMFVCWUYKkAZMxZAGdxlDMQBAG+TBP4B6RyJAAAAAElFTkSuQmCC");
        }

        .ace_scrollbar {
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: 6;
        }

        .ace_scrollbar-inner {
            position: absolute;
            cursor: text;
            left: 0;
            top: 0;
        }

        .ace_scrollbar-v {
            overflow-x: hidden;
            overflow-y: scroll;
            top: 0;
        }

        .ace_scrollbar-h {
            overflow-x: scroll;
            overflow-y: hidden;
            left: 0;
        }

        .ace_print-margin {
            position: absolute;
            height: 100%;
        }

        .ace_text-input {
            position: absolute;
            z-index: 0;
            width: 0.5em;
            height: 1em;
            opacity: 0;
            background: transparent;
            -moz-appearance: none;
            appearance: none;
            border: none;
            resize: none;
            outline: none;
            overflow: hidden;
            font: inherit;
            padding: 0 1px;
            margin: 0 -1px;
            text-indent: -1em;
            -ms-user-select: text;
            -moz-user-select: text;
            -webkit-user-select: text;
            user-select: text;
            white-space: pre !important;
        }

        .ace_text-input.ace_composition {
            background: inherit;
            color: inherit;
            z-index: 1000;
            opacity: 1;
            text-indent: 0;
        }

        .ace_layer {
            z-index: 1;
            position: absolute;
            overflow: hidden;
            word-wrap: normal;
            white-space: pre;
            height: 100%;
            width: 100%;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            pointer-events: none;
        }

        .ace_gutter-layer {
            position: relative;
            width: auto;
            text-align: right;
            pointer-events: auto;
        }

        .ace_text-layer {
            font: inherit !important;
        }

        .ace_cjk {
            display: inline-block;
            text-align: center;
        }

        .ace_cursor-layer {
            z-index: 4;
        }

        .ace_cursor {
            z-index: 4;
            position: absolute;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-left: 2px solid;
            transform: translatez(0);
        }

        .ace_slim-cursors .ace_cursor {
            border-left-width: 1px;
        }

        .ace_overwrite-cursors .ace_cursor {
            border-left-width: 0;
            border-bottom: 1px solid;
        }

        .ace_hidden-cursors .ace_cursor {
            opacity: 0.2;
        }

        .ace_smooth-blinking .ace_cursor {
            -webkit-transition: opacity 0.18s;
            transition: opacity 0.18s;
        }

        .ace_editor.ace_multiselect .ace_cursor {
            border-left-width: 1px;
        }

        .ace_marker-layer .ace_step, .ace_marker-layer .ace_stack {
            position: absolute;
            z-index: 3;
        }

        .ace_marker-layer .ace_selection {
            position: absolute;
            z-index: 5;
        }

        .ace_marker-layer .ace_bracket {
            position: absolute;
            z-index: 6;
        }

        .ace_marker-layer .ace_active-line {
            position: absolute;
            z-index: 2;
        }

        .ace_marker-layer .ace_selected-word {
            position: absolute;
            z-index: 4;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .ace_line .ace_fold {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: inline-block;
            height: 11px;
            margin-top: -2px;
            vertical-align: middle;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="), url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACJJREFUeNpi+P//fxgTAwPDBxDxD078RSX+YeEyDFMCIMAAI3INmXiwf2YAAAAASUVORK5CYII=");
            background-repeat: no-repeat, repeat-x;
            background-position: center center, top left;
            color: transparent;
            border: 1px solid black;
            border-radius: 2px;
            cursor: pointer;
            pointer-events: auto;
        }

        .ace_dark .ace_fold {
        }

        .ace_fold:hover {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAJCAYAAADU6McMAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAJpJREFUeNpi/P//PwOlgAXGYGRklAVSokD8GmjwY1wasKljQpYACtpCFeADcHVQfQyMQAwzwAZI3wJKvCLkfKBaMSClBlR7BOQikCFGQEErIH0VqkabiGCAqwUadAzZJRxQr/0gwiXIal8zQQPnNVTgJ1TdawL0T5gBIP1MUJNhBv2HKoQHHjqNrA4WO4zY0glyNKLT2KIfIMAAQsdgGiXvgnYAAAAASUVORK5CYII="), url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAA3CAYAAADNNiA5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACBJREFUeNpi+P//fz4TAwPDZxDxD5X4i5fLMEwJgAADAEPVDbjNw87ZAAAAAElFTkSuQmCC");
        }

        .ace_tooltip {
            background-color: #FFF;
            background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.1));
            background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.1));
            border: 1px solid gray;
            border-radius: 1px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            color: black;
            max-width: 100%;
            padding: 3px 4px;
            position: fixed;
            z-index: 999999;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            cursor: default;
            white-space: pre;
            word-wrap: break-word;
            line-height: normal;
            font-style: normal;
            font-weight: normal;
            letter-spacing: normal;
            pointer-events: none;
        }

        .ace_folding-enabled > .ace_gutter-cell {
            padding-right: 13px;
        }

        .ace_fold-widget {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0 -12px 0 1px;
            display: none;
            width: 11px;
            vertical-align: top;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42mWKsQ0AMAzC8ixLlrzQjzmBiEjp0A6WwBCSPgKAXoLkqSot7nN3yMwR7pZ32NzpKkVoDBUxKAAAAABJRU5ErkJggg==");
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 3px;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .ace_folding-enabled .ace_fold-widget {
            display: inline-block;
        }

        .ace_fold-widget.ace_end {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAANElEQVR42m3HwQkAMAhD0YzsRchFKI7sAikeWkrxwScEB0nh5e7KTPWimZki4tYfVbX+MNl4pyZXejUO1QAAAABJRU5ErkJggg==");
        }

        .ace_fold-widget.ace_closed {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAGCAYAAAAG5SQMAAAAOUlEQVR42jXKwQkAMAgDwKwqKD4EwQ26sSOkVWjgIIHAzPiCgaqiqnJHZnKICBERHN194O5b9vbLuAVRL+l0YWnZAAAAAElFTkSuQmCCXA==");
        }

        .ace_fold-widget:hover {
            border: 1px solid rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 1px 1px rgba(255, 255, 255, 0.7);
        }

        .ace_fold-widget:active {
            border: 1px solid rgba(0, 0, 0, 0.4);
            background-color: rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(255, 255, 255, 0.8);
        }

        .ace_dark .ace_fold-widget {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHklEQVQIW2P4//8/AzoGEQ7oGCaLLAhWiSwB146BAQCSTPYocqT0AAAAAElFTkSuQmCC");
        }

        .ace_dark .ace_fold-widget.ace_end {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAH0lEQVQIW2P4//8/AxQ7wNjIAjDMgC4AxjCVKBirIAAF0kz2rlhxpAAAAABJRU5ErkJggg==");
        }

        .ace_dark .ace_fold-widget.ace_closed {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAFCAYAAACAcVaiAAAAHElEQVQIW2P4//+/AxAzgDADlOOAznHAKgPWAwARji8UIDTfQQAAAABJRU5ErkJggg==");
        }

        .ace_dark .ace_fold-widget:hover {
            box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .ace_dark .ace_fold-widget:active {
            box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);
        }

        .ace_fold-widget.ace_invalid {
            background-color: #FFB4B4;
            border-color: #DE5555;
        }

        .ace_fade-fold-widgets .ace_fold-widget {
            -webkit-transition: opacity 0.4s ease 0.05s;
            transition: opacity 0.4s ease 0.05s;
            opacity: 0;
        }

        .ace_fade-fold-widgets:hover .ace_fold-widget {
            -webkit-transition: opacity 0.05s ease 0.05s;
            transition: opacity 0.05s ease 0.05s;
            opacity: 1;
        }

        .ace_underline {
            text-decoration: underline;
        }

        .ace_bold {
            font-weight: bold;
        }

        .ace_nobold .ace_bold {
            font-weight: normal;
        }

        .ace_italic {
            font-style: italic;
        }

        .ace_error-marker {
            background-color: rgba(255, 0, 0, 0.2);
            position: absolute;
            z-index: 9;
        }

        .ace_highlight-marker {
            background-color: rgba(255, 255, 0, 0.2);
            position: absolute;
            z-index: 8;
        }

        .ace_br1 {
            border-top-left-radius: 3px;
        }

        .ace_br2 {
            border-top-right-radius: 3px;
        }

        .ace_br3 {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .ace_br4 {
            border-bottom-right-radius: 3px;
        }

        .ace_br5 {
            border-top-left-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        .ace_br6 {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        .ace_br7 {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        .ace_br8 {
            border-bottom-left-radius: 3px;
        }

        .ace_br9 {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br10 {
            border-top-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br11 {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br12 {
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br13 {
            border-top-left-radius: 3px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br14 {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .ace_br15 {
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        /*# sourceURL=ace/css/ace_editor.css */</style>
    <style id="ace-tm">.ace-tm .ace_gutter {
            background: #f0f0f0;
            color: #333;
        }

        .ace-tm .ace_print-margin {
            width: 1px;
            background: #e8e8e8;
        }

        .ace-tm .ace_fold {
            background-color: #6B72E6;
        }

        .ace-tm {
            background-color: #FFFFFF;
            color: black;
        }

        .ace-tm .ace_cursor {
            color: black;
        }

        .ace-tm .ace_invisible {
            color: rgb(191, 191, 191);
        }

        .ace-tm .ace_storage, .ace-tm .ace_keyword {
            color: blue;
        }

        .ace-tm .ace_constant {
            color: rgb(197, 6, 11);
        }

        .ace-tm .ace_constant.ace_buildin {
            color: rgb(88, 72, 246);
        }

        .ace-tm .ace_constant.ace_language {
            color: rgb(88, 92, 246);
        }

        .ace-tm .ace_constant.ace_library {
            color: rgb(6, 150, 14);
        }

        .ace-tm .ace_invalid {
            background-color: rgba(255, 0, 0, 0.1);
            color: red;
        }

        .ace-tm .ace_support.ace_function {
            color: rgb(60, 76, 114);
        }

        .ace-tm .ace_support.ace_constant {
            color: rgb(6, 150, 14);
        }

        .ace-tm .ace_support.ace_type, .ace-tm .ace_support.ace_class {
            color: rgb(109, 121, 222);
        }

        .ace-tm .ace_keyword.ace_operator {
            color: rgb(104, 118, 135);
        }

        .ace-tm .ace_string {
            color: rgb(3, 106, 7);
        }

        .ace-tm .ace_comment {
            color: rgb(76, 136, 107);
        }

        .ace-tm .ace_comment.ace_doc {
            color: rgb(0, 102, 255);
        }

        .ace-tm .ace_comment.ace_doc.ace_tag {
            color: rgb(128, 159, 191);
        }

        .ace-tm .ace_constant.ace_numeric {
            color: rgb(0, 0, 205);
        }

        .ace-tm .ace_variable {
            color: rgb(49, 132, 149);
        }

        .ace-tm .ace_xml-pe {
            color: rgb(104, 104, 91);
        }

        .ace-tm .ace_entity.ace_name.ace_function {
            color: #0000A2;
        }

        .ace-tm .ace_heading {
            color: rgb(12, 7, 255);
        }

        .ace-tm .ace_list {
            color: rgb(185, 6, 144);
        }

        .ace-tm .ace_meta.ace_tag {
            color: rgb(0, 22, 142);
        }

        .ace-tm .ace_string.ace_regex {
            color: rgb(255, 0, 0)
        }

        .ace-tm .ace_marker-layer .ace_selection {
            background: rgb(181, 213, 255);
        }

        .ace-tm.ace_multiselect .ace_selection.ace_start {
            box-shadow: 0 0 3px 0px white;
        }

        .ace-tm .ace_marker-layer .ace_step {
            background: rgb(252, 255, 0);
        }

        .ace-tm .ace_marker-layer .ace_stack {
            background: rgb(164, 229, 101);
        }

        .ace-tm .ace_marker-layer .ace_bracket {
            margin: -1px 0 0 -1px;
            border: 1px solid rgb(192, 192, 192);
        }

        .ace-tm .ace_marker-layer .ace_active-line {
            background: rgba(0, 0, 0, 0.07);
        }

        .ace-tm .ace_gutter-active-line {
            background-color: #dcdcdc;
        }

        .ace-tm .ace_marker-layer .ace_selected-word {
            background: rgb(250, 250, 255);
            border: 1px solid rgb(200, 200, 250);
        }

        .ace-tm .ace_indent-guide {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAE0lEQVQImWP4////f4bLly//BwAmVgd1/w11/gAAAABJRU5ErkJggg==") right repeat-y;
        }

        /*# sourceURL=ace/css/ace-tm */</style>
    <style>    .error_widget_wrapper {
            background: inherit;
            color: inherit;
            border: none
        }

        .error_widget {
            border-top: solid 2px;
            border-bottom: solid 2px;
            margin: 5px 0;
            padding: 10px 40px;
            white-space: pre-wrap;
        }

        .error_widget.ace_error, .error_widget_arrow.ace_error {
            border-color: #ff5a5a
        }

        .error_widget.ace_warning, .error_widget_arrow.ace_warning {
            border-color: #F1D817
        }

        .error_widget.ace_info, .error_widget_arrow.ace_info {
            border-color: #5a5a5a
        }

        .error_widget.ace_ok, .error_widget_arrow.ace_ok {
            border-color: #5aaa5a
        }

        .error_widget_arrow {
            position: absolute;
            border: solid 5px;
            border-top-color: transparent !important;
            border-right-color: transparent !important;
            border-left-color: transparent !important;
            top: -5px;
        }</style>
    <link rel="stylesheet" type="text/css" id="u0"
          href="/vendor/tcg/voyager/assets/js/skins/voyager/skin.min.css">
</head>

<div class="gr-top-z-index gr-top-zero" tabindex="-1">
    <div class="_30JeG" style="transform: translate(833px, 985px);">
        <div class="_2A3ER">
            <div class="_1y1wn _2R8DE undefined"></div>
            <div class="_24Em3">
                <div class="_21QaI _1L80j" tabindex="-1"></div>
            </div>
            <div class="_2-7o4"></div>
            <div class="_24Em3">
                <div class="_21QaI _1pbTT" data-action="editor" tabindex="-1"></div>
            </div>
        </div>
    </div>
</div>
<div style="visibility: hidden; top: -9999px; position: absolute; opacity: 0;">
    <div class="_30JeG" style="transform: translate(902px, 1000px);">
        <div class="_2A3ER">
            <div class="_1y1wn _2R8DE undefined"></div>
            <div class="_24Em3">
                <div class="_21QaI _1L80j" tabindex="-1"></div>
            </div>
            <div class="_2-7o4"></div>
            <div class="_24Em3">
                <div class="_21QaI _1pbTT" data-action="editor" tabindex="-1"></div>
            </div>
        </div>
    </div>
</div>
<div style="visibility: hidden; top: -9999px; position: absolute; opacity: 0;"></div>
<body class="voyager posts" data-gr-c-s-loaded="true">

<div id="voyager-loader" style="display: none;">
    <img src="/vendor/tcg/voyager/assets/images/logo-icon.png" alt="Voyager Loader">
</div>


<div class="app-container" style="">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">


        <script>
            (function () {
                var appContainer = document.querySelector('.app-container'),
                    sidebar = appContainer.querySelector('.side-menu'),
                    navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                    loader = document.getElementById('voyager-loader'),
                    hamburgerMenu = document.querySelector('.hamburger'),


                    containerTransition = appContainer.style.transition;



                if (window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
                    appContainer.className += ' expanded no-animation';
                    loader.style.left = (sidebar.clientWidth / 2) + 'px';
                    hamburgerMenu.className += ' is-active no-animation';
                }

            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <h1 class="page-title">
                    <i class="voyager-news"></i>
                    Add Post
                </h1>
                <div id="voyager-notifications"></div>
                <div class="page-content container-fluid">
                    <form class="form-edit-add" role="form" action="http://127.0.0.1:8000/admin/posts" method="POST"
                          enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        {!! Form::token() !!}

                        <div class="row">
                            <div class="col-md-8">
                                <!-- ### TITLE ### -->
                                <div class="panel">

                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="voyager-character"></i> Post Title
                                            <span class="panel-desc"> The title for your post</span>
                                        </h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Title" value="">
                                    </div>
                                </div>

                                <!-- ### CONTENT ### -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon wb-book"></i> Post Content</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div id="mceu_17" class="mce-tinymce mce-container mce-panel" hidefocus="1"
                                         tabindex="-1" role="application"
                                         style="visibility: hidden; border-width: 1px;">
                                        <div id="mceu_17-body" class="mce-container-body mce-stack-layout">
                                            <div id="mceu_18"
                                                 class="mce-toolbar-grp mce-container mce-panel mce-stack-layout-item mce-first"
                                                 hidefocus="1" tabindex="-1" role="group">
                                                <div id="mceu_18-body" class="mce-container-body mce-stack-layout">
                                                    <div id="mceu_19"
                                                         class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last"
                                                         role="toolbar">
                                                        <div id="mceu_19-body"
                                                             class="mce-container-body mce-flow-layout">
                                                            <div id="mceu_20"
                                                                 class="mce-container mce-flow-layout-item mce-first mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_20-body">
                                                                    <div id="mceu_0"
                                                                         class="mce-widget mce-btn mce-menubtn mce-first mce-btn-has-text"
                                                                         tabindex="-1" aria-labelledby="mceu_0"
                                                                         role="button" aria-haspopup="true"
                                                                         aria-expanded="false">
                                                                        <button id="mceu_0-open" role="presentation"
                                                                                type="button" tabindex="-1"><span
                                                                                    class="mce-txt">Formats</span> <i
                                                                                    class="mce-caret"></i></button>
                                                                    </div>
                                                                    <div id="mceu_1" class="mce-widget mce-btn"
                                                                         tabindex="-1" role="button" aria-label="Bold">
                                                                        <button id="mceu_1-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-bold"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_2" class="mce-widget mce-btn"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Italic">
                                                                        <button id="mceu_2-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-italic"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_3" class="mce-widget mce-btn mce-last"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Underline">
                                                                        <button id="mceu_3-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-underline"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_21"
                                                                 class="mce-container mce-flow-layout-item mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_21-body">
                                                                    <div id="mceu_4"
                                                                         class="mce-widget mce-btn mce-colorbutton mce-first"
                                                                         role="button" tabindex="-1"
                                                                         aria-haspopup="true" aria-label="Text color">
                                                                        <button role="presentation" hidefocus="1"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-forecolor"></i><span
                                                                                    id="mceu_4-preview"
                                                                                    class="mce-preview"></span></button>
                                                                        <button type="button" class="mce-open"
                                                                                hidefocus="1" tabindex="-1"><i
                                                                                    class="mce-caret"></i></button>
                                                                    </div>
                                                                    <div id="mceu_5"
                                                                         class="mce-widget mce-btn mce-colorbutton mce-last"
                                                                         role="button" tabindex="-1"
                                                                         aria-haspopup="true"
                                                                         aria-label="Background color">
                                                                        <button role="presentation" hidefocus="1"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-backcolor"></i><span
                                                                                    id="mceu_5-preview"
                                                                                    class="mce-preview"></span></button>
                                                                        <button type="button" class="mce-open"
                                                                                hidefocus="1" tabindex="-1"><i
                                                                                    class="mce-caret"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_22"
                                                                 class="mce-container mce-flow-layout-item mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_22-body">
                                                                    <div id="mceu_6"
                                                                         class="mce-widget mce-btn mce-first"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Align left">
                                                                        <button id="mceu_6-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-alignleft"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_7" class="mce-widget mce-btn"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Align center">
                                                                        <button id="mceu_7-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-aligncenter"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_8" class="mce-widget mce-btn mce-last"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Align right">
                                                                        <button id="mceu_8-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-alignright"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_23"
                                                                 class="mce-container mce-flow-layout-item mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_23-body">
                                                                    <div id="mceu_9"
                                                                         class="mce-widget mce-btn mce-first"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Decrease indent">
                                                                        <button id="mceu_9-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-outdent"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_10"
                                                                         class="mce-widget mce-btn mce-last"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Increase indent">
                                                                        <button id="mceu_10-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-indent"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_24"
                                                                 class="mce-container mce-flow-layout-item mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_24-body">
                                                                    <div id="mceu_11"
                                                                         class="mce-widget mce-btn mce-first"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Insert/edit link">
                                                                        <button id="mceu_11-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-link"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_12" class="mce-widget mce-btn"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Insert/edit image">
                                                                        <button id="mceu_12-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-image"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_13"
                                                                         class="mce-widget mce-btn mce-menubtn"
                                                                         tabindex="-1" aria-labelledby="mceu_13"
                                                                         role="button" aria-label="Table"
                                                                         aria-haspopup="true">
                                                                        <button id="mceu_13-open" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-table"></i> <i
                                                                                    class="mce-caret"></i></button>
                                                                    </div>
                                                                    <div id="mceu_14" class="mce-widget mce-btn"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Insert Youtube video">
                                                                        <button id="mceu_14-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-none"
                                                                                    style="background-image: url('/vendor/tcg/voyager/assets/js/plugins/youtube/icon.png')"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div id="mceu_15"
                                                                         class="mce-widget mce-btn mce-last"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Giphy GIF Search">
                                                                        <button id="mceu_15-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-none"
                                                                                    style="background-image: url('/vendor/tcg/voyager/assets/js/plugins/giphy/html/img/giphy_icon_16.png')"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="mceu_25"
                                                                 class="mce-container mce-flow-layout-item mce-last mce-btn-group"
                                                                 role="group">
                                                                <div id="mceu_25-body">
                                                                    <div id="mceu_16"
                                                                         class="mce-widget mce-btn mce-first mce-last"
                                                                         tabindex="-1" role="button"
                                                                         aria-label="Source code">
                                                                        <button id="mceu_16-button" role="presentation"
                                                                                type="button" tabindex="-1"><i
                                                                                    class="mce-ico mce-i-code"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="mceu_27"
                                                 class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last"
                                                 hidefocus="1" tabindex="-1" role="group"
                                                 style="border-width: 1px 0px 0px;">
                                                <div id="mceu_27-body" class="mce-container-body mce-flow-layout">
                                                    <div id="mceu_28" class="mce-path mce-flow-layout-item mce-first">
                                                        <div role="button" class="mce-path-item mce-last" data-index="0"
                                                             tabindex="-1" id="mceu_28-0" aria-level="1">h2
                                                        </div>
                                                    </div>
                                                    <div id="mceu_29"
                                                         class="mce-flow-layout-item mce-last mce-resizehandle"><i
                                                                class="mce-ico mce-i-resize"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="form-control richTextBox" id="richtextbody" name="body"
                                              style="border: 0px; display: none;" aria-hidden="true"></textarea>
                                </div><!-- .panel -->

                                <!-- ### EXCERPT ### -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Excerpt
                                            <small>Small description of this post</small>
                                        </h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <textarea class="form-control" name="excerpt"></textarea>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Additional Fields</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <!-- ### DETAILS ### -->
                                <div class="panel panel panel-bordered panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon wb-clipboard"></i> Post Details</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="name">URL slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                   placeholder="slug" {="" data-slug-origin="title"
                                                   data-slug-forceupdate="true}" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Post Status</label>
                                            <select class="form-control" name="status">
                                                <option value="PUBLISHED">published</option>
                                                <option value="DRAFT">draft</option>
                                                <option value="PENDING">pending</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Post Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Featured</label>
                                            <input type="checkbox" name="featured">
                                        </div>
                                    </div>
                                </div>

                                <!-- ### IMAGE ### -->
                                <div class="panel panel-bordered panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon wb-image"></i> Post Image</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <input type="file" name="image">
                                    </div>
                                </div>

                                <!-- ### SEO CONTENT ### -->
                                <div class="panel panel-bordered panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon wb-search"></i> SEO Content</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse"
                                               aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="name">Meta Description</label>
                                            <textarea class="form-control" name="meta_description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Meta Keywords</label>
                                            <textarea class="form-control" name="meta_keywords"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Seo Title</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                   placeholder="SEO Title" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="icon wb-plus-circle"></i> Create New Post
                        </button>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="/admin/upload" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                        <input type="hidden" name="_token" value="aS7pVBZM19ZqgKVuyvxmR8AoXv5TFxxquTv85SPE">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="posts">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mceu_30" class="mce-container mce-panel mce-floatpanel mce-menu mce-menu-align" hidefocus="1" tabindex="-1"
     role="application" aria-labelledby="mceu_30" aria-describedby="mceu_30-none"
     style="border-width: 1px; z-index: 65535; left: 102px; top: 414px; width: 160px; display: none;">
    <div id="mceu_30-body" class="mce-container-body mce-stack-layout" role="menu" style="width: 160px;">
        <div id="mceu_31"
             class="mce-menu-item mce-menu-item-expand mce-menu-item-preview mce-stack-layout-item mce-first"
             tabindex="-1" role="menuitem" aria-haspopup="true" aria-expanded="true"><i class="mce-ico mce-i-none"></i>&nbsp;<span
                    id="mceu_31-text" class="mce-text">Headings</span>
            <div class="mce-caret"></div>
        </div>
        <div id="mceu_32" class="mce-menu-item mce-menu-item-expand mce-menu-item-preview mce-stack-layout-item"
             tabindex="-1" role="menuitem" aria-haspopup="true" aria-expanded="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span
                    id="mceu_32-text" class="mce-text">Inline</span>
            <div class="mce-caret"></div>
        </div>
        <div id="mceu_33" class="mce-menu-item mce-menu-item-expand mce-menu-item-preview mce-stack-layout-item"
             tabindex="-1" role="menuitem" aria-haspopup="true" aria-expanded="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span
                    id="mceu_33-text" class="mce-text">Blocks</span>
            <div class="mce-caret"></div>
        </div>
        <div id="mceu_34"
             class="mce-menu-item mce-menu-item-expand mce-menu-item-preview mce-stack-layout-item mce-last"
             tabindex="-1" role="menuitem" aria-haspopup="true" aria-expanded="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span
                    id="mceu_34-text" class="mce-text">Alignment</span>
            <div class="mce-caret"></div>
        </div>
    </div>
</div>
<div id="mceu_35" class="mce-container mce-panel mce-floatpanel mce-menu mce-menu-sub mce-menu-align mce-menu-sub-tr-tl"
     hidefocus="1" tabindex="-1" role="application" aria-labelledby="mceu_35" aria-describedby="mceu_35-none"
     style="border-width: 1px; z-index: 65536; left: 262px; top: 418px; width: 198px; display: none;">
    <div id="mceu_35-body" class="mce-container-body mce-stack-layout" role="menu" style="width: 198px;">
        <div id="mceu_36" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-first" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_36-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:28px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 1</span>
        </div>
        <div id="mceu_37" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_37-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:21px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 2</span>
        </div>
        <div id="mceu_38" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_38-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:16.38px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 3</span>
        </div>
        <div id="mceu_39" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_39-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 4</span>
        </div>
        <div id="mceu_40" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_40-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11.62px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 5</span>
        </div>
        <div id="mceu_41" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-last" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_41-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9.38px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Heading 6</span>
        </div>
    </div>
</div>
<div id="mceu_42"
     class="mce-container mce-panel mce-floatpanel mce-menu mce-menu-has-icons mce-menu-sub mce-menu-align mce-menu-sub-tr-tl"
     hidefocus="1" tabindex="-1" role="application" aria-labelledby="mceu_42" aria-describedby="mceu_42-none"
     style="border-width: 1px; z-index: 65537; left: 262px; top: 447px; width: 160px; display: none;">
    <div id="mceu_42-body" class="mce-container-body mce-stack-layout" role="menu" style="width: 160px;">
        <div id="mceu_43" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-first" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-bold"></i>&nbsp;<span id="mceu_43-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:700;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Bold</span>
        </div>
        <div id="mceu_44" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-italic"></i>&nbsp;<span id="mceu_44-text"
                                                                                                  class="mce-text"
                                                                                                  style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:italic;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Italic</span>
        </div>
        <div id="mceu_45" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-underline"></i>&nbsp;<span id="mceu_45-text"
                                                                                                     class="mce-text"
                                                                                                     style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:normal;text-decoration:underline solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Underline</span>
        </div>
        <div id="mceu_46" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-strikethrough"></i>&nbsp;<span
                    id="mceu_46-text" class="mce-text"
                    style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:normal;text-decoration:line-through solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Strikethrough</span>
        </div>
        <div id="mceu_47" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-superscript"></i>&nbsp;<span id="mceu_47-text"
                                                                                                       class="mce-text"
                                                                                                       style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11.6667px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Superscript</span>
        </div>
        <div id="mceu_48" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-subscript"></i>&nbsp;<span id="mceu_48-text"
                                                                                                     class="mce-text"
                                                                                                     style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11.6667px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Subscript</span>
        </div>
        <div id="mceu_49" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-last" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-code"></i>&nbsp;<span id="mceu_49-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:monospace;font-size:14px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Code</span>
        </div>
    </div>
</div>
<div id="mceu_50" class="mce-container mce-panel mce-floatpanel mce-menu mce-menu-sub mce-menu-align mce-menu-sub-tr-tl"
     hidefocus="1" tabindex="-1" role="application" aria-labelledby="mceu_50" aria-describedby="mceu_50-none"
     style="border-width: 1px; z-index: 65537; left: 262px; top: 476px; width: 160px; display: none;">
    <div id="mceu_50-body" class="mce-container-body mce-stack-layout" role="menu" style="width: 160px;">
        <div id="mceu_51" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-first mce-active"
             tabindex="-1" role="menuitem" aria-checked="true" aria-pressed="true"><i class="mce-ico mce-i-none"></i>&nbsp;<span
                    id="mceu_51-text" class="mce-text"
                    style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Paragraph</span>
        </div>
        <div id="mceu_52" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_52-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Blockquote</span>
        </div>
        <div id="mceu_53" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_53-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Div</span>
        </div>
        <div id="mceu_54" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-last" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-none"></i>&nbsp;<span id="mceu_54-text"
                                                                                                class="mce-text"
                                                                                                style="font-family:monospace;font-size:14px;font-weight:400;font-style:normal;text-decoration:none solid rgb(68, 68, 68);text-transform:none;color:rgb(68, 68, 68);padding:0 2px;border:0px none rgb(68, 68, 68);border-radius:0px;outline:rgb(68, 68, 68) none 0px;text-shadow:none;">Pre</span>
        </div>
    </div>
</div>
<div id="mceu_55"
     class="mce-container mce-panel mce-floatpanel mce-menu mce-menu-has-icons mce-menu-sub mce-menu-align mce-menu-sub-tr-tl"
     hidefocus="1" tabindex="-1" role="application" aria-labelledby="mceu_55" aria-describedby="mceu_55-none"
     style="border-width: 1px; z-index: 65538; left: 262px; top: 505px; width: 160px; display: none;">
    <div id="mceu_55-body" class="mce-container-body mce-stack-layout" role="menu" style="width: 160px;">
        <div id="mceu_56" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-first" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-alignleft"></i>&nbsp;<span id="mceu_56-text"
                                                                                                     class="mce-text"
                                                                                                     style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;">Left</span>
        </div>
        <div id="mceu_57" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-aligncenter"></i>&nbsp;<span id="mceu_57-text"
                                                                                                       class="mce-text"
                                                                                                       style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;">Center</span>
        </div>
        <div id="mceu_58" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-alignright"></i>&nbsp;<span id="mceu_58-text"
                                                                                                      class="mce-text"
                                                                                                      style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;">Right</span>
        </div>
        <div id="mceu_59" class="mce-menu-item mce-menu-item-preview mce-stack-layout-item mce-last" tabindex="-1"
             role="menuitem" aria-checked="false"><i class="mce-ico mce-i-alignjustify"></i>&nbsp;<span
                    id="mceu_59-text" class="mce-text"
                    style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;">Justify</span></div>
    </div>
</div>
<div id="mceu_67" class="mce-widget mce-tooltip mce-tooltip-n" role="presentation"
     style="left: 450px; top: 414px; z-index: 131070; display: none;">
    <div class="mce-tooltip-arrow"></div>
    <div class="mce-tooltip-inner">Align right</div>
</div>
</body>

<!-- Javascript Libs -->


<script type="text/javascript" src="/vendor/tcg/voyager/assets/js/app.js"></script>
<script type="text/javascript" async="" src="https://s3.amazonaws.com/laravelvoyager/voyager.js"></script>


<script>

</script>
<script>
    $('document').ready(function () {
        $('#slug').slugify();

    });
</script>