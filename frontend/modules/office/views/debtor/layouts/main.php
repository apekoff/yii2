<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

#$this->registerCssFile('/css/fine-style.css');
#$this->registerCssFile('/css/fine-common.css');
#$this->registerCssFile('/css/fine-bookkeeping.css');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode('Печать документов') ?></title>

    <style>
        /* /css/fine-style.css */

        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code,
        del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, input[type=text], textarea {
            margin: 0;
            padding: 0;
            border: 0;
            outline: none 0;
            background: transparent;
        }

        td {
            vertical-align: top;
        }

        body, td {
            font-size: 14px;
        }

        b, strong {
            font-weight: bold;
        }

        i {
            font-style: italic;
        }

        ul {
            list-style: none;
        }

        ol {
            margin-left: 40px;
        }

        ol li {
            padding-top: 4px;
        }

        blockquote, q {
            quotes: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        a, span {
            vertical-align: baseline;
        }

        img {
            vertical-align: top;
            text-decoration: none;
        }

        a {
            text-decoration: none;
            /*color:#990000;*/
            /*color: #003d80;*/
            color: #0645ad;
        }

        a:hover {
            text-decoration: underline;
            color: #cc0000;
        }

        p {
            margin-top: 6px;
        }

        /* â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” general styles â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” */
        html, body {
            width: 100%;
            /*height: 100%;*/
        }

        body {
            /*font: normal 14px "Arial", Arial, Helvetica, sans-serif;*/
            font: normal 14px -apple-system, BlinkMacSystemFont, Roboto, Open Sans, Helvetica Neue, sans-serif;
            color: #333333;
            background: url(bg/pattern_017.png);
            background: url(bg/pattern_017_1.png) fixed;
            /*background: url(bg/pattern_1.jpg);*/
            /*background: url(bg_pattern.png);*/
            /*background: #fafafa;*/
            /*background: #E7F7FF;*/
            /*background: #FFF4DD;*/
            /*background: #FFF6E2;*/
            /*background: #f9f6ef;*/
            /*background-size: cover;
    background: #f0f0f1 url(bg/bg-sea1-5.jpg) no-repeat fixed;*/
        }

        #center_column h1 {
            padding: 2px 0 4px 0;
            margin-bottom: 16px;
            border-bottom: 1px solid #dfdede;
            font-weight: normal;
            font-size: 20px;
            color: #000;
            text-transform: none;
        }

        h4.aless, .sidebar h4.aless, h2.aless, div.column div.block h4 a {
            /*color: #fff;
    background: #646464;*/
            padding: 10px;
            font-size: 14px;
            font-weight: normal;
            display: block;
            text-decoration: none;
            color: #fff;
            background: #8b99bb;
            /*color: #000;
    background: #f5f5f5;
    background: #8b99bb;
    color: #fff;
    font-size: 14px;
    font-weight: normal;
    display: block;*/
        }

        .aless {
            position: relative;
            padding: 10px 10px 10px 48px !important;
        }

        .aless span {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 10px;
            width: 16px;
            text-align: center;
            /*background: #4c4c4c;*/
            background: #8b99bb;
            background: #475c8e;
            border-right: 1px solid #fff;
        }

        a.iconified {
            position: relative;
            padding: 10px 10px 10px 48px !important;
            /*background: url(bg-gray.gif);*/
            /*background: #8b99bb;
    color:white;
    */
            background: #ececec;
            color: #000;
            font-size: 14px;
            font-weight: normal;

            display: block;
            text-decoration: none !important;
        }

        .center_column h2,
        .center_column h3,
        .center_column h4 {
            padding: 8px 10px 9px 12px;
            margin-top: 12px;
            /*background: #646464;*/
            background: #8b99bb;
            color: #32529e;
            background: #f1f1f3;
            font-size: 16px;
            text-transform: none;
            font-weight: normal;
        }

        .center_column h2.ahas,
        .center_column h3.ahas,
        .center_column h4.ahas {
            padding: 0;
        }

        .center_column h1.section, .center_column h2.section, .center_column h3.section, .center_column h4.section {
            border-left: 9px solid #8b99bb;
            border-bottom: 1px solid #ccc;
        }

        #wrapper1 {

        }

        #wrapper2 {
        }

        #wrapper3 {
            max-width: 1400px;
            margin: 20px auto 40px;
            text-align: left;
            background: white;
            /*box-shadow: 0 0 10px rgba(145, 145, 145, 0.56);*/
            box-shadow: 0 0 8px #A0A0A0;
            border-radius: 3px;
            /*overflow: hidden;*/
            border: 1px solid #aaa;
        }

        #wrapper3.hidden {
            height: 1px;
            overflow: hidden;
        }

        #columns {
            /*width: 1200px;*/
        }

        #columns2 {
            overflow: hidden;
            padding: 20px 0 0 6px;
        }

        /*body#index #columns2 {
	padding: 30px 0 0 30px;
}*/

        #left_column {
            float: left;
            width: 260px;
            margin-left: -100%;
        }

        #center_column {
            float: left;
            width: 100%;
        }

        #content-part {
            /*width: 650px;
    float: left;
    margin: 0 0 40px 18px;*/
            margin: 0 260px 40px 278px;
        }

        .content-part a {

        }

        .content-part a:hover {
            text-decoration: underline;
            /*text-decoration: none;*/
        }

        .content-warn, .content-advice {
            background-color: #C55A5A;
            font-weight: bold;
            display: inline-block;
            padding: 1px 4px;
            color: #fff;
        }

        .article-notice {
            margin-top: 6px;
            padding: 6px 10px 6px 16px;
            /*background: #ffe9f9;*/
            background: #fff2fb;
            border: #e6aed7 1px solid;
            /*background: #fff6fc;
    border: #f9e3f3 1px solid;*/
        }

        .article-important {
            margin-top: 6px;
            padding: 6px 10px;
            /*background: #ffffb3;
    border: #efef89 1px solid;
    border-left: 6px solid #ffc345;*/
            background: #ffffe7;
            border: #f9f9c1 1px solid;
            border-left: 6px solid #ffc345;
        }

        .content-advice {
            background-color: #22B255;
        }

        .codex-warn {
            background: #5abda2;
            padding: 1px 15px;
            float: left;
            margin: 0 8px 10px 0;
            font-size: 24px;
            cursor: default;
            line-height: 150%;
        }

        .codex-warn-soon {
            background: #f75050;
        }

        /* global form styles */
        input[type=text], input[type=password],
        textarea,
        select {
            background: #fff;
            border: 1px solid #bdc2c9;
            font: normal 14px "Arial";
            color: #333;
            padding: 4px;
        }

        button {
            padding: 4px;
            font-size: 14px;
        }

        input[type=text], input[type=password] {
            height: 22px;
            /*padding:0 4px;*/
        }

        /* selectss */

        form.std p.select select {
            width: 210px;
        }

        select#days {
            width: 45px;
            margin: 0 8px 0 0;
        }

        select#months {
            width: 85px;
            margin: 0 8px 0 0;
        }

        select#years {
            width: 58px;
        }

        /* text inputs */
        input.text {
            height: 15px;
            padding: 1px;
        }

        p.text input,
        p.password input {
            width: 206px;
            height: 15px;
            padding: 1px;
        }

        /* textarea */
        textarea {
            padding: 1px;
        }

        /* radio & checkboxes */
        form.std p.checkbox,
        form.std p.radio {
            overflow: hidden;
        }

        form.std p.checkbox {
            padding-left: 157px;
        }

        .checkbox input,
        .radio input {
            display: inline;
            background: none;
            border: none;
            position: relative;
            left: 0;
            top: 1px;
        }

        * + html p.checkbox input {
            margin: -3px 0 0 -4px;
        }

        * + html p.radio input {
            margin: -3px 0 0 -4px;
        }

        .checkbox label,
        .radio label {
            width: auto;
            padding: 0 0 0 3px;
        }

        form.std p.submit {
            padding: 20px 0 0 157px;
        }

        form.std .required sup {
            vertical-align: top;
            font: normal 13px "Tahoma";
            color: #da0f00;
        }

        form.std .required_desc {
            padding-left: 157px;
        }

        /* â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” header styles â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” */
        div#header {
            position: relative;
            background: #fdfdfd;
        }

        #header_logo {
            /*width: 262px;
    position: absolute;
    left: 25px;
    top: 25px;*/

            /*width: 230px;
    position: absolute;
    left: 16px;
    top: 20px;
    border-left: #E50000 18px solid;
    padding: 3px 0 6px 10px;*/

            width: 225px;
            position: absolute;
            left: 14px;
            top: 16px;
            border-left: #E50000 18px solid;
            padding: 8px 0 10px 10px;
            background: #F5F5F5;
            box-shadow: 0 0 2px #CCC;
            text-decoration: none;
            color: #E50000;
            font-size: 23px;
            font-weight: bold;
        }

        #header_slogan {
            padding-top: 7px;
            color: #4A4B4C;
            display: block;
            font-size: 12px;
            font-weight: normal;
            line-height: 140%;
            text-align: right;
            padding-right: 13px;
        }

        #header_logo a {
            /*text-decoration:none  !important;
    color: #e50000;
    font-size: 20px;
    font-weight: bold;
    background: url(favicon.png) no-repeat;
    padding:2px 0 8px 034px;*/

            /*text-decoration: none;
    color: #E50000;
    font-size: 23px;
    font-weight: bold;*/
        }

        /*#header_logo a:hover {
	text-decoration:underline !important;
}*/

        /*#info_block_top {
	float: right;

}*/

        #info_block_top ul li {
            float: left;
        }

        #info_block_top ul li + li {
            margin: 0 0 0 2px;
        }

        #info_block_top ul li a {
            /*display: block;

    border: 1px solid #e8e8e8;
    color: #cc0000;
    text-align: center;
    padding:4px 4px 4px 4px;
    font-size:14px;
    background:  no-repeat 4px 50%;
    text-decoration: none;
    max-width: 270px;
    overflow: hidden;
    white-space: nowrap;
    position: relative;*/

            display: block;
            border-bottom: 2px solid #d8cae0;
            color: #333;
            text-align: center;
            font-size: 14px;
            background: no-repeat 4px 50% #f3f4f7;
            text-decoration: none;
            max-width: 270px;
            overflow: hidden;
            white-space: nowrap;
            border-radius: 4px;
            padding: 5px 10px;
        }

        #info_block_top ul li a:hover {
            /*text-decoration: underline;*/
            /*background-color: #fafafa;*/
            background-color: #8b99bb;
            color: #fff;
            border-bottom-color: #8b99bb;
        }

        #info_block_top ul li.favorite a {
            background-image: url(favorite.png);
            padding-left: 26px;
        }

        #info_block_top ul li.user a {
            padding-left: 26px;
            background-image: url(online3.png);
        }

        #info_block_top ul li.exit a {
            padding-left: 26px;
            background-image: url(exit.png);
        }

        /*#info_block_top ul li.bill a {
	font-size:12px;
	font-weight:normal;
	padding:6px 4px;
	color:#333;
	text-decoration: none;
}*/
        /*#info_block_top ul li.bill a:hover {
	text-decoration: underline;
}*/

        /*#info_block_top ul li a:hover {
	color: #cc0000;
}*/

        #info_block_top ul li.selected_language {
            width: 19px;
            height: 18px;
            background: #f8f8f8;
            border: 1px solid #e8e8e8;
            font: bold 11px/17px "Arial";
            color: #cc0000;
            text-align: center;
            text-transform: capitalize;
        }

        #header_user {
            float: right;
            padding: 49px 75px 0 0;
        }

        #header_user ul {
        }

        #header_user ul li {
            float: left;
        }

        #header_user ul li + li {
            margin: 0 0 0 12px;
            padding: 0 0 0 12px;
            border-left: 1px solid #9e9f9f;
        }

        #header_user #header_user_info {
            font-size: 11px;
            color: #4a4b4c;
        }

        #header_user #header_user_info a {
            font-size: 11px;
            color: #9e9f9f;
            text-decoration: none;
            text-transform: lowercase;
        }

        #header_user #header_user_info a:hover {
            color: #4a4b4c;
        }

        #header_user #header_user_info span {
            font-size: 11px;
            color: #cc0000;
        }

        #header_user #your_account {
        }

        #header_user #your_account a {
            font: bold 11px "Arial";
            color: #646060;
            text-decoration: none;
        }

        #header_user #your_account a:hover {
            color: #cc0000;
        }

        #header_user #shopping_cart {
        }

        #header_user #shopping_cart a {
            font: bold 11px "Arial";
            color: #646060;
            text-decoration: none;
        }

        #header_user #shopping_cart a:hover {
            color: #cc0000;
        }

        #header_user #shopping_cart span {
            font-size: 11px;
            color: #cc0000;
        }

        #search_block_top {
            float: right;
            margin-left: 615px;

            /*height: 34px;*/
            padding: 25px 20px 0 0;
        }

        #searchbox {
            padding-top: 5px;
        }

        /*#search_block_top form {
	padding: 6px 20px 0 0;
}*/

        #search_block_top form.dragged {
            background: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 2px;
            position: fixed;
            z-index: 2;
            top: 2px;
            right: 2px;
            padding: 10px 5px 5px 10px;
        }

        #search_block_top form.dragged #search_query_top {
            width: 240px;
            color: #333;
        }

        input.search_query {
            border: 1px solid #999999;
            font-size: 16px;
            height: auto;
            padding: 6px 0 6px 24px;
            width: 360px;
            background: url(search_bg.png) 0 50% no-repeat #fff;
        }

        div#search_block_top input.search_query {
            color: #000;
            width: 300px;
        }

        div#search_block_top select {
            height: 32px;
            width: 160px;
            font-size: 16px;
            padding: 6px 4px;
            color: #000;
            margin: 0;
        }

        .search_submit {
            height: 26px;
            display: inline-block;

            padding: 0 0 0 11px;
            background: url(search_btn.png) 0 0 no-repeat;
            text-decoration: none !important;
        }

        #header_right {
            height: 105px;
        }

        #tmheaderlinks {
            clear: both;
            padding: 6px 0 0 20px;
            position: relative;
        }

        #tmheaderlinks li {
            float: left;
            background: url(headerlink.png) right 0 no-repeat;
        }

        #tmheaderlinks li a {
            height: 29px;
            padding: 10px 19px 0 19px;
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
        }

        #tmheaderlinks li a:hover,
        #tmheaderlinks li a.active {
            background: url(headerlink.png) 0 0 repeat-x;
        }

        #top-menu td {
            /*border-right: 1px solid #403f3f;*/
            /*border-right: 1px solid #dfd4e6;*/
            border-right: 1px solid #dfd4e6;
            border-left: 1px solid #ffffff;
            height: 1px;
        }

        #top-menu a {
            /*padding: 11px 19px;
    display: block;
    font-family: 'Open Sans', sans-serif;
    font-size: 13px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
    -webkit-transition: background-color .5s ease-out;
    transition: background-color .5s ease-out;*/
            padding: 11px 19px 9px;
            border-top: 1px solid #dfd4e6;
            border-bottom: 4px solid #8b99bb;
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: #000;
            text-decoration: none;
            text-align: center;
            height: 100%;

        }

        #top-menu a:hover,
        #top-menu a.active {
            background: #ececec;

            background: #8296ca;
            background: #7a8ab7;
            border-bottom-color: #5c6e9c;
            color: #fff;
            /*border-right: 1px solid #dfd4e6;
    border-left: 1px solid #ffffff;*/
        }

        #top-menu {
            /*width:100%;
    margin: 6px 0;
    background: rgb(77, 77, 77);*/
            width: 100%;
            margin: 6px 0;
            background: #f5f5f5;
            /*border-collapse: separate;*/
            /*box-shadow: 0 1px 3px #a98bbb;*/
        }

        .breadcrumb {
            color: #666;
            font-size: 11px;
            padding: 12px 0 0 14px;
        }

        .breadcrumb .navigation-pipe {
            padding: 0 5px;
        }

        .breadcrumb a {
            color: #666;
            white-space: nowrap;
            /*text-decoration: underline;*/
        }

        .breadcrumb a:hover {
            color: #cc0000;
            /*text-decoration: none;*/
        }

        .breadcrumb .navigation_page {
            white-space: nowrap;
        }

        a.anchor, a[name] {
            position: absolute;
            margin-top: -40px;
        }

        h4.name {
            color: #fff;
            padding: 10px;
            font-size: 14px;
        }

        /*#left_column h4, #left_column a {
	width:auto;
}*/

        .support a {
            display: block;
            line-height: 32px;
            vertical-align: middle;
            font-size: 16px;
            padding: 12px 10px 12px 52px;
            background: url(support.png) no-repeat 10px 50%;
            text-decoration: underline;
        }

        .block {
            background: #fafafa;
            box-shadow: 0 0 2px #ccc;
            font-size: 12px;
        }

        .shadowed {
            opacity: 0.7;
        }

        .shadowed:hover {
            opacity: 1;
        }

        .ad2-edit img {
            width: 16px;
            height: 16px;
        }

        .ad2-edit b, a.iconified b {
            display: none;
            background: #fafafa;
            color: #000;
            left: 0;
            padding: 10px;
            position: absolute;
            top: 36px;
            /*width: 320px;*/
            z-index: 2;
            font-weight: normal;
            font-size: 12px;

        }

        .ad2-edit b {
            width: auto;
        }

        .ad2-edit:hover b, a.iconified:hover b {
            display: inline-block;
        }

        .ad2-options a {
            font-size: 12px;
            width: 200px;
            margin-bottom: 4px;
            display: inline-block;
        }

        div.column div.block h4 a:hover, a.iconified:hover {
            background: #475c8e;
            text-decoration: none;
            color: #fff;
        }

        /*a.iconified:hover span {
	border:none;
}*/

        a.iconified span {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 10px;
            width: 16px;
            text-align: center;
            background: #475c8e no-repeat 50% 50%;
            border-right: 1px solid #fff;
        }

        #categories_block_left {
            margin: 0 0 14px 0;
        }

        .sidebar h4 {
            padding: 8px 18px 8px 16px;
            /*background: #DD0000;*/
            /*background: #407EAF;*/
            /*background: #318CD3;*/
            background: #DFEEFF;
            font-size: 16px;
            /*text-align: right;*/
            color: #1981BB;
        }

        .sidebar h4.l {
            padding: 6px 18px 4px 16px;
            color: #4E4E4E;
            border-bottom: 1px solid #DFDEDE;
            font-size: 16px;
            text-align: left;
            background: none;
        }

        .block-dogovory {
            margin-bottom: 20px;
        }

        .block-dogovory ul {
            padding: 0;
        }

        .block-dogovory ul li a, #search-suggest ul a, .search-suggest ul a {
            display: block;
            /*font-weight: bold;*/
            padding: 8px 0 8px 10px;
            /*color:#555;*/
            color: #333;
            background: url(bullet_category.gif) 0 11px no-repeat;
            border-bottom: 1px solid #DFDEDE;
            text-decoration: none;
        }

        .block-dogovory ul li a {
            background: url(bullet_category.gif) 8px 12px no-repeat;
            padding: 6px 10px 6px 16px;
        }

        /*.block-dogovory ul li.selected a, .block-dogovory ul li a:hover {
	color:white;
	background: #cc0000;
	border-bottom: 1px solid #cc0000;
} */

        .block-dogovory ul li.selected a, .block-dogovory ul li a:hover {
            color: white;
            background: #8b99bb;
            border-left: 10px solid #475c8e;
            padding-left: 6px;
            border-bottom: none;
            padding-bottom: 7px;
        }

        .block-dogovory ul li a:hover {
            color: #000;
            background: #ECECEC;
            border-left: 10px solid #9B9B9B;
            /*background: #8b99bb;*/
            border-left: 10px solid #475c8e;
        }

        .block-dogovory ul li.nested {
            background: white;
        }

        .block-dogovory ul li.nested a {
            padding-left: 24px;
            font-weight: normal;
            background-position: 16px 12px;
        }

        .block-dogovory ul li.selected a, .block-dogovory ul li.nested a:hover {
            padding-left: 14px;
        }

        /* ---- footer styles ------------ */
        #footer {
            clear: both;
            background: #FCFCFC;
            border-top: 1px solid #eee;
            padding-bottom: 10px;
        }

        #tmfooterlinks {
            padding: 0 0 0 50px;
            overflow: hidden;
        }

        #tmfooterlinks div {
            width: 220px;
            float: left;
            padding: 0 20px 0 0;
        }

        #tmfooterlinks h4 {
            padding: 24px 0 7px 0;
            font-size: 13px;
            font-weight: 600;
            color: #4b4b4b;
        }

        #tmfooterlinks ul li {
            padding: 4px 0 0 0;
        }

        #tmfooterlinks ul li a {
            font-size: 11px;
            color: #767676;
            text-decoration: none;
        }

        #tmfooterlinks ul li a:hover {
            color: #cc0000;
            text-decoration: underline;
        }

        #tmfooterlinks p {
            padding: 26px 0 0 0;
            clear: both;
            font-size: 11px;
            color: #919191;
        }

        #tmfooterlinks p a {
            color: #919191;
        }

        .block-inner {
            background: #fafafa;
        }

        /*.dogovor-section-descr, */
        #dogovor-section-descr {
            margin-bottom: 12px;
            line-height: 150%;
        }

        /*.dogovor-section-descr ul, */
        #dogovor-section-descr ul {
            margin-left: 40px;
            list-style: disc;
        }

        /*.dogovor-section-descr li, */
        #dogovor-section-descr li {
            padding-top: 6px;
        }

        .dog-sec-info {
            margin: 22px 0;
            overflow: hidden;
            font-size: 14px;
        }

        .dog-sec-info ul li {
            float: left;
            margin-right: 12px;
            background: #7EA77E;
            color: white;
            padding: 6px 10px;
        }

        #dog-sec-warn {
            border: 1px solid #ccc;
            background: #fafafa;
            padding: 10px;
            margin-top: 12px;
        }

        #dog-sec-warn2 {
            width: 500px;
            margin: 0 auto;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
        }

        #dog-sec-warn2 .dsw-in {
            font-size: 30px;
            color: #920909;
            padding: 10px;
        }

        #dog-sec-warn2 a.dsw-a {
            color: white;
            text-decoration: none;
            display: block;
            float: left;
            width: 230px;
            padding: 10px;
            margin-top: 1px;
        }

        #dog-sec-warn2 a.dsw-a-yes {
            background: #6C976C;
        }

        #dog-sec-warn2 a.dsw-a-no {
            background: #B3AD6E;
            margin-left: 1px;
            width: 229px;
        }

        #dog-sec-warn2 a.dsw-a-yes:hover {
            background: #009600;
        }

        #dog-sec-warn2 a.dsw-a-no:hover {
            background: #DD6000;
        }

        .codex-alert {
            background: #F7FFCC;
            font-size: 13px;
            margin: 0 12px 12px;
            padding: 6px 20px 10px;
            border: 1px solid #B9BDA5;
            line-height: 150%;
        }

        .codex-alert a {
            color: #003d80;
            text-decoration: underline;
        }

        .codex-alert a:hover {
            text-decoration: none;
        }

        .doc-list li {
            overflow: hidden;
            height: 26px;
        }

        .doc-date {
            float: left;
            padding: 4px 0;
        }

        .doc-list li a:hover {
            margin: -3px 0 0 -11px;
            position: absolute;
            width: 650px;
            background: #fafafa;
            border: 1px solid #ccc;
            border-radius: 2px;
            padding: 10px 0 10px 20px;
            white-space: normal;
            color: #cc0000;
        }

        .doc-list li a:visited {
            color: #999;
        }

        .doc-list li a {
            white-space: nowrap;
            display: block;
            padding: 8px 0 8px 10px;
            color: #1B4C81;
            font-size: 14px;
        }

        .doc-list-example li a {
            background: url("bullet_category.gif") 0 10px no-repeat;
            display: block;
            padding: 4px 0 4px 10px;
        }

        .search-section-pane {
            margin-bottom: 12px;
        }

        .search-section-pane input[type=text] {
            font-size: 16px;
            height: auto;
            padding: 6px 0 6px 24px;

            width: 360px;
            background-position: 0 50%;
            border: 1px solid #999;
        }

        a.section-search {
            background: #cc0000;
            color: white;
            text-transform: uppercase;
            padding: 8px 12px;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
        }

        .content-part {
            color: #000;
        }

        .content-text ul {
            margin-left: 40px;
            list-style: disc;
        }

        .content-text {
            font-size: 14px;
            line-height: 150%;
        }

        .content-text h2, .content-text h3, .content-text h4 {
            padding: 0;
            color: #990000;
            background: none;
            margin-top: 24px;
            /*color: #990000;
     background: none;
     border-bottom: 1px solid #999;
     border-top: 1px solid #999;
    font-weight: bold;*/
        }

        .content-text h2, h2.blue {
            background: none;
            color: #00049e;
            margin-top: 24px;
            font-size: 20px;
        }

        .content-text h3 {
            font-size: 14px;
            font-weight: bold;
        }

        .dogovor_content {
            margin-top: 20px;
            padding: 10px 12px 15px 12px;
            border: 1px solid #ececec;
            color: #000;
            font-size: 14px;
            overflow: hidden;
            background: #fafafa;
        }

        .dogovor_content p {
            margin-top: 5px;
            line-height: 150%;
        }

        .dogovor_content li {
            line-height: 150%;
        }

        .read_content p {
            font-size: 14px;
            line-height: 160%;
        }

        .read_content li {
            font-size: 14px;
            line-height: 160%;
            padding-top: 6px;
        }

        .dogovor_content ul {
            margin: 4px 0 4px 30px;
            list-style: disc;
        }

        .dogovor_content a:hover {
            text-decoration: none;
        }

        .bordered td {
            border: 1px solid black;
            padding: 4px;
        }

        .agreement-groups > li > ul {
            margin-left: 12px;
        }

        .agreement-groups > li {

        }

        .search-list {
            margin: 6px 0 6px 20px;
            font-size: 12px;
        }

        .search-list li {
            padding: 12px 0;
            border-bottom: 1px dotted #cccccc;
        }

        .search-list li:nth-last-child(1) {
            border-bottom: none;
        }

        .search-list .s-title {
            font-size: 14px;
        }

        .search-list .s-chain {
            font-size: 11px;
            color: #666666;
            margin: 4px 0;
        }

        .doc-bg {
            width: 150px;
            height: 30px;
            background: url(starrating.gif) repeat-x;
            position: absolute;
        }

        .doc-list .doc-bg, .doc-sm {
            width: 75px;
            height: 15px;
            position: static;
            background: url(starrating_sm.png) repeat-x;
            display: inline-block;
            margin-right: 4px;
        }

        .doc-list .doc-active, .doc-sm-active {
            position: static;
            background: url(starrating_sm.png) repeat-x 0 -15px;
            height: 15px;
        }

        .doc-list .doc-active:hover {
            background: url(starrating_sm.png) repeat-x 0 -15px;
        }

        .doc-active {
            height: 30px;
            position: absolute;
            background: url(starrating.gif) repeat-x 0 -60px;
        }

        .dog-block {
            width: 150px;
            height: 30px;
            display: inline-block;
        }

        .star {
            position: absolute;
            height: 30px;
            cursor: pointer;
        }

        .star1 {
            width: 30px;
        }

        .star2 {
            width: 60px;
        }

        .star3 {
            width: 90px;
        }

        .star4 {
            width: 120px;
        }

        .star5 {
            width: 150px;
        }

        .star:hover, .star-selected {
            background: url(starrating.gif) repeat-x 0 -30px;
        }

        .doc-active:hover {
            background: none;
        }

        .doc-vote-block {
            float: right;
            padding-left: 4px;
            margin-top: -4px;
            width: 300px;
        }

        .star-voted {
            display: none;
            position: absolute;
            width: 150px;
            height: 30px;
            cursor: default;
        }

        .doc-vote-info {
            display: inline-block;
            padding-right: 6px;
        }

        .doc-rating {
            font-size: 14px;
            font-weight: bold;
            padding: 1px 10px;
        }

        .doc-voted {
            font-size: 26px;
            letter-spacing: -1px;
            padding: 2px 8px;
            /*font-weight:bold;*/
        }

        .doc-video-code {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            margin-left: -350px;
            margin-top: -240px;
            padding: 30px;
            background: #ddd;
            z-index: 12;
            border-radius: 4px;
            border: 1px #ccc solid;
        }

        .doc-v-close {
            position: absolute;
            right: 5px;
            top: 2px;
            color: #cc0000;
            display: block;
            text-decoration: none !important;
            font-size: 30px;
            width: 20px;
        }

        .doc-v-close:hover {
            color: #333;
        }

        .doc-videos ul {
            overflow: hidden;
            padding: 0 0 2px 2px;
        }

        .doc-videos ul li {
            float: left;
            margin-right: 10px;
        }

        .doc-videos ul li img {
            height: 100px;
        }

        .doc-videos {
            border: 1px solid #eaeaea;
            margin-top: 12px;
        }

        .doc-videos h3 {
            background: #eaeaea;
            color: #444;
            margin: 2px 0;

        }

        .doc-videos li a {
            position: relative;
            display: inline-block;
        }

        .doc-videos li div {
            width: 165px;
            font-size: 11px;
        }

        .doc-videos li a i {
            display: block;
            position: absolute;
            background: url(video_play1.png) no-repeat 50% 50%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .doc-videos li a:hover i {
            background-image: url(video_play_h.png);
        }

        .dog-brief {
            padding: 10px 20px;
            /*background: #DCF2F5;
    border: 1px solid #AF7C29;*/
            background: #fffcf6;
            border: 1px solid #d8c19b;
            border-radius: 2px;
            font-size: 14px;
            line-height: 150%;
        }

        .dog-brief h4, .dog-brief h3, .dog-brief h2 {
            background: none;
            border-bottom: 1px solid #777;
            color: #00049e;
            margin: 20px 0 14px 0;
            padding: 6px 0;
            font-size: 18px;
        }

        .dog-brief h4 {
            font-size: 14px;
            color: #990000;
            border: none;
            margin: 12px 0 0 0;
            padding: 0;
            font-weight: bold;
        }

        .dog-brief h2 {
            margin-top: 0;
        }

        .dog-brief ul {
            margin-left: 32px;
            list-style: disc;
            margin-top: 6px;
        }

        .dog-headers {
            border: 1px solid #d8d8d8;
            padding: 4px 20px 14px;

            border-radius: 2px;
            margin-top: 6px;
            background: #eff8f9;
        }

        .dog-headers h3 {
            color: #000;
            border: none;
            margin: 0;
        }

        .dog-headers a {
            color: #0645ad;
        }

        textarea {
            padding: 4px;
        }

        .rating_4 {
            background: #e8f7e1;
            color: #66a449;
        }

        .rating_3 {
            background: #fcf5c8;
            color: #c3b453;
        }

        .rating_2 {
            background: #f7eaea;
            color: #a87575;
        }

        .rating_1 {
            background: #f3f3f3;
            color: #999;
        }

        .sbm {
            background: url("search_btn.png") 0 0 no-repeat transparent;
            font-size: 13px;
            font-weight: bold;
            padding: 4px 6px;
            text-transform: uppercase;
            border: none;
            color: #FFFFFF;
        }

        .vote-form {
            display: block;
            background: #f5f5f5;
            border: 1px solid #ccc;
            width: 410px;
            padding: 30px 40px 40px;
            border-radius: 4px;
            position: fixed;
            left: 50%;
            top: 50%;
            margin: -128px 0 0 -240px;

        }

        .vote-form h2 {
            padding: 0 0 4px 0;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            color: #333;
        }

        .vote-comment-bg {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 12;
        }

        .vote-form .doc-voted {
            display: inline-block;
            vertical-align: middle;
            width: 35px;
            padding: 1px;
            text-align: center;
        }

        .close-btn {
            float: right;
            text-decoration: none !important;
            font-size: 30px;
            margin-top: -8px;
        }

        .doc-info td {
            padding: 4px 0;
        }

        .doc-info td:nth-child(2n+3) {
            padding-left: 16px;
        }

        #doc-remember {
            display: block;
            text-align: right;
            background: #D88C00;
            padding: 8px 18px 8px 16px;
            font-size: 16px;
            width: 275px;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        #doc-remember:hover {
            background: #e00;
        }

        /* â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” printable version â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€”â€” */
        @media print {

            * {
                background: none !important;
                background-color: white !important;
            }

            div#left_column, div#right_column, div#footer, a.button, span.button, .button, ul#usefull_link_block, div#header_user, #info_block_top,
            #search_block_top, #currencies_block_top, ul#header_links, ul.idTabs, #availability_statut br {
                display: none;
            }

            div#center_column {
                width: 100%;
            }

            input.text {
                border: 1px solid gray;
            }

            .block_hidden_only_for_screen {
                display: block;
                margin-top: 1em;
            }

            #more_info_sheets #idTab1 {
                width: 530px;
            }

        }

        #document-not-found {
            position: fixed;
            right: 20px;
            bottom: 0;
            background: white;
            border: 1px solid #999;
            border-bottom: none;
            border-radius: 4px 4px 0 0;
            padding: 10px 20px 10px 20px;

        }

        #document-not-found a:hover {
            text-decoration: none;
        }

        #document-not-found p {
            color: #333;
            margin-top: 0;
        }

        #document-not-found a {
            font-size: 17px;
            color: #cc0000;
            font-weight: bold;
            text-decoration: underline;
            line-height: 24px;
        }

        #document-not-found a.dnf-close {
            position: absolute;
            right: 12px;
            top: 8px;
            font-size: 22px;
            color: #444;
            text-decoration: none;
        }

        #document-not-found a.dnf-close:hover {
            color: #cc0000;
        }

        #doc-not .vote-form {
            margin: -200px 0 0 -240px;
        }

        #ajaxLoad {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 117px;
            height: 22px;
            margin-left: -58px;
            margin-top: -11px;

            border: 1px #CCCCCC solid;
            font-size: 18px;
            padding: 10px 16px 10px 54px;
            background: url("roller3.gif") no-repeat 16px 50% white;
            background-size: 25px 25px;
            color: #666666;
            display: none;
            z-index: 2;
        }

        #search-suggest, .search-suggest {
            position: absolute;
            border: 1px solid #ccc;
            background: white;
            width: 301px;
            z-index: 2;
        }

        #search-suggest li, .search-suggest li {
            border-top: 1px solid #DFDEDE;
            padding-right: 10px;
            height: 27px;
        }

        #search-suggest li.first_item, .search-suggest li.first_item {
            border: none;
        }

        #search-suggest ul a, .search-suggest ul a {
            padding: 6px 8px 6px 18px;
            background-position: 10px 11px;
            white-space: nowrap;
            float: none;
            border: none;
            overflow: hidden;
        }

        #search-suggest ul a:hover, .search-suggest ul a:hover {
            color: #e0292a;
            background-color: #f5f5f5;
            overflow: visible;
            position: absolute;
            border: 1px solid #ccc;
            margin: -1px 0 0 -1px;
            white-space: normal;
            width: 275px;
        }

        #search-suggest li.first_item a:hover, .search-suggest li.first_item a:hover {
            border: 1px solid #ccc;
        }

        .codex-tree h3 {
            background: none;
            text-transform: none;
            color: #444;
            padding: 6px 0;
            font-weight: bold;
        }

        .codex-tree h3 a {
            color: #333;
            text-decoration: none;
        }

        .codex-tree h3 a:hover {
            text-decoration: underline;
        }

        .codex-tree2 ul {
            margin-left: 12px;
        }

        /*.codex-tree2 h3 {
	margin-top:0;
	padding: 6px 0;
	font-size:14px;
	font-weight:normal;
	background: none;
	text-transform: none;
	color:#444;
	white-space: nowrap;
	overflow: hidden;
}*/

        .codex-tree2 li {
            /*margin-top:0;*/
            padding: 6px 0;
            /*font-size:14px;
    font-weight:normal;
    background: none;
    text-transform: none;*/
            /*color:#444;*/
            white-space: nowrap;
            overflow: hidden;
        }

        .codex-tree2 div {
            /*margin-top:0;*/
            padding: 8px 0 0 10px;
            /*font-size:14px;
    font-weight:normal;
    background: none;
    text-transform: none;*/
            /*color:#444;*/
            white-space: nowrap;
            overflow: hidden;
        }

        .codex-tree ul {
            padding-left: 10px;
        }

        .codex-notice {
            padding-left: 12px;
            color: #000099;

        }

        .codex-tree2 h3 a {
            /*color:#333;
    background: url(bullet_category.gif) no-repeat 0 8px;
    padding-left:12px;
    display:inline-block;
    text-decoration: underline;*/
        }

        /*.codex-tree2 h3 a:hover {
	text-decoration: none;
}*/

        .codex-tree3 ul {
            margin-left: 12px;
        }

        .codex-chain {
            margin: 6px 0;
        }

        .codex-chain div {
            margin: 6px 0;
        }

        #codex-content .codex-chain h3 {
            font-size: 14px;
        }

        .codex-chain a {
            text-decoration: none;
            color: #555;
            font-size: 13px;
            margin-right: 4px;
        }

        .codex-chain a:hover {
            color: #003d80;
            text-decoration: underline;
        }

        .codex-table {
            border: 1px solid #999;
            margin-top: 6px;
            text-indent: 0;
        }

        .codex-table td {
            border: 1px solid #999;
            padding: 4px 10px;
        }

        .block-dogovory .codex-tree3 a {
            font-weight: normal;
        }

        .codex-article, .codex-list li {
            overflow: hidden;
            border-bottom: 1px solid #ccc;
        }

        .codex-list li:nth-last-child(1), .codex-root li:nth-last-child(1) {
            border-bottom: none;
        }

        .download-part .codex-article {
            position: static;
        }

        .codex-article a:hover, .codex-list a:hover {
            color: #cc0000;
            background-color: #F7F7F7;
        }

        .codex-article a, .codex-list a {
            background: url("bullet_category.gif") 6px 16px no-repeat;
            display: block;
            padding: 10px 0 10px 16px;
            color: #004990;
            font-size: 14px;
            text-decoration: none !important;
        }

        ul.codex-ul-num, ul.codex-ul-abc {
            list-style: none;
            margin-left: 32px;
        }

        ul.codex-ul-num > li, ul.codex-ul-abc > li {
            text-indent: -18px;
        }

        .dogovor_content a.codex-ia {
            color: #737373;
            font-size: 12px;
        }

        .doc-list2 a:hover {
            background: none;
        }

        .doc-list2 a:hover span {
            background: #F7F7F7;
        }

        .doc-list2 a {
            background: none;
            padding: 0;
        }

        .doc-list2 .doc-sm {
            float: left;
            margin: 10px 0;
        }

        .doc-list2 span {
            display: block;
            margin-left: 80px;
            padding: 10px 0 10px 6px;
        }

        .doc-list2 span img {
            margin-right: 6px;
        }

        .codex-i {
            display: none;
            color: #004990;
        }

        .codex-ia {
            text-decoration: none;
        }

        .comment-form {
            padding: 10px 5px 10px 0;
        }

        .comment-form input[type=text], .comment-form input[type=password], .comment-form textarea {
            background: #fafafa;
            width: 400px;
        }

        .comment-quote, blockquote {
            margin: 4px 0 4px 20px;
            background: #F0F7F8;
            /*background: #EAFAFC;*/
            padding: 10px;
            border: 1px solid #ECECEC;
            border-left: orange 4px solid;
            max-height: 400px;
            overflow-y: auto;
        }

        blockquote {
            padding-top: 2px;
        }

        .comment-form table {
            margin: 12px 0 0 10px;
        }

        #comments-pane {
            /*background: #f0f0f0;*/
            /*overflow: hidden;*/
            padding: 6px 6px 10px;
            /*font-size: 14px;
    line-height: 150%;*/
        }

        .no-answers-yet {
            font-size: 14px;
            line-height: 150%;
        }

        .comment-item {

            /*margin-top: 4px;
    padding-top:10px;
    position: relative;
    background: #fff;
    border: 1px solid #eaeaea;*/
            margin-top: 14px;
            padding-top: 10px;
            position: relative;
            background: #fff;
            border: 1px solid #f3f3f3;
            border-bottom: 6px solid #ccdec4;
        }

        .comment-item .description {
            padding: 10px 0 30px 0;
            font-size: 14px;
        }

        .comment-item h2, .comment-item h3 {
            background: none;
            color: #900;
            padding: 0;
            text-transform: none;
        }

        .comment-top-right {
            position: absolute;
            right: 6px;
            top: 8px;
            z-index: 1;
            font-size: 12px;
        }

        .comment-top-right .q a {
            display: inline-block;
            padding: 2px;
            background: #a9ced2;
        }

        .comment-top-right .q a:hover {
            background: #5299a1;
        }

        #comment-message {

            /*display:none;*/
        }

        #comment-bad, #comment-posted {
            padding: 12px 10px;
            background: #E8F7E1;
        }

        .comment-item td {
            padding: 0 6px;
        }

        .comment-item .comment-text {
            border-left: 1px solid #ccc;
            padding: 0 6px 12px 12px;
            width: 100%;
            /*position: relative;*/
        }

        .comment-item .comment-content {
            padding: 0 6px 34px;
            font-size: 14px;
            /*line-height: 18px;*/
            line-height: 150%;
        }

        .comment-item .comment-content ul, .comment-item .comment-content ol {
            margin-left: 6px;
            list-style: disc;
            padding-left: 20px;
            overflow: hidden;
        }

        .comment-item .comment-content ol {
            overflow: hidden;
        }

        .comment-item .comment-content ul.codex-ul-num, .comment-item .comment-content ul.codex-ul-abc {
            list-style: none;
        }

        .comment-content h3 {
            font-size: 17px;
            font-weight: normal;
            margin-top: 20px;
        }

        .comment-content h4 {
            font-size: 14px;
            color: #005099;
            background: none;
            margin: 12px 0 0 0;
            padding: 0;
            font-weight: normal;
        }

        .comment-content a {
            color: #1D66B6;
            text-decoration: underline;
        }

        .comment-content a:hover {
            text-decoration: none;
        }

        .comment-name {
            font-weight: bold;
            font-size: 13px;
            width: 170px;
        }

        .comment-time {
            color: #777;
            margin-top: 2px;
        }

        .comment-time a {
            color: #993333;
        }

        a.com-time {
            text-decoration: none;
            color: #777;
            font-size: 12px;
        }

        a.com-time:hover {
            text-decoration: underline;
        }

        .comment-mark {
            float: right;
            font-weight: bold;
            padding: 0 12px;
            font-size: 32px;
            line-height: 150%;
        }

        .comment-jur {
            margin-top: 4px;
        }

        .q-user-card {
            float: left;
            padding: 5px 10px 10px 10px;
            margin: 0 10px 10px 4px;
            border: 1px solid #E6E6E6;
            background: #f9fdf8;
            border-radius: 2px;
            width: 170px;
            font-size: 12px;
        }

        .q-user-card .comment-name a {
            text-decoration: none;
            color: #990000;
        }

        .q-user-card .comment-name a:hover {
            color: #cc0000;
        }

        .q-user-card a:hover {
            text-decoration: underline;
        }

        .comment-jur a {
            color: #fff;
        }

        .comment-city {
            color: #777;
            margin-top: 4px;
        }

        .comment-city a {
            color: #777;
            text-decoration: underline;
        }

        .comment-city a:hover {
            text-decoration: none;
        }

        .comment-pay {
            margin-top: 4px;
        }

        .comment-pay a {
            color: white;
            background: #7EA77E;
            padding: 6px 4px 6px 12px;
            font-weight: bold;
            display: block;
            text-decoration: none !important;
        }

        .comment-pay a:hover {
            background: #2F862F
        }

        .comment-dialog a {
            background: #a79b7e;
        }

        .comment-dialog a:hover {
            background: #9e8036
        }

        .comment-rating {
            display: inline-block;
            background: #c15555;
            color: #fff;
            font-weight: bold;
            padding: 4px 8px;
        }

        .comment-rating-w {

        }

        .comment-r-word {
            color: #990000;
            display: inline-block;
            padding: 3px 8px;
            border: #c15555 solid 1px;
        }

        .comment-rating-w a:hover .comment-rating {
            background: #cc0000;
        }

        .comment-rating-w a:hover .comment-r-word {
            border-color: #cc0000;
        }

        .comment-photo {
            margin: 4px 0;
            position: relative;
        }

        .comment-photo a {
            position: relative;
            display: block;
            width: 160px;
            border: 1px solid #ccc;
            padding: 4px;
        }

        .comment-photo img {
            width: 160px;
        }

        .comment-photo .rjur-onl-status {
            left: 4px;
            right: 4px;
            bottom: 4px;
        }

        .download-part a, .download-part .vk-like {
            display: block;
        }

        .download-part ul {
            width: 400px;
        }

        .content-part .codex-root a {
            font-size: 16px;
            color: #1B4C81;
            text-decoration: none;
        }

        .codex-root a:hover {
            color: #990000;
            text-decoration: underline;
        }

        .codex-root li {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            font-size: 12px;
        }

        .codex-root li ul {
            overflow: hidden;
        }

        .codex-root li li {
            float: left;
            border-bottom: none;
            /*font-size: 12px;*/
            margin-left: 20px;
            padding: 10px 0 0;
        }

        .codex-children a {
            font-size: 14px;
        }

        #docFilter2 {
            width: 160px;
            color: black;
            font-size: 12px;
        }

        .doc-list3 {
            margin: 0 10px;
        }

        .content-part .doc-list3 a {
            font-size: 14px;
            display: block;
        }

        .content-part .doc-list3 a span {
            float: right;
            font-size: 12px;
            color: #777;
        }

        #dont-go {
            margin-left: -10px;
            position: absolute;
            background: #f1eadf;
            border: 1px solid #ccc;
            width: 270px;
            padding: 24px 3px 10px;
            border-radius: 2px;
            z-index: 11;
            font-size: 14px;
        }

        .dont-go-fixed {
            position: fixed !important;
            top: 10px;
        }

        #dont-go a.dnf-close {
            position: absolute;
            right: 3px;
            top: 3px;
            font-size: 20px;
            color: white;
            text-decoration: none;
            background: #666;
            border-radius: 2px;
            border: 1px solid #333;
            line-height: 12px;
            padding: 2px;
        }

        #dont-go a.dnf-close:hover {
            background: #555;
            border: 1px solid #444;
        }

        #dont-go.fixed-dontgo {
            position: fixed;
            top: 15px;
        }

        #dont-go .section-search {
            background: #c47300;
        }

        #dont-go p {
            margin: 8px 0 12px;
        }

        #dont-go h4 {
            font-size: 18px;
            color: white;
            background: linear-gradient(to top, #B06600, #DF8200);
            padding-bottom: 8px;
        }

        .jur-info-table td {
            font-size: 14px;
            padding: 3px;
        }

        .dogovor-quote {
            position: absolute;
            width: 300px;
            top: 16px;
            left: 280px;
            color: #666;
            overflow: hidden;
            background: #fcfcfc;
            padding: 4px 10px;
            height: 75px;
            box-shadow: 0 0 2px #ccc;
            cursor: pointer;
            font-size: 12px;
        }

        .dogovor-quote:hover {
            overflow: auto;
            height: auto;
            min-height: 75px;
            box-shadow: 0 0 2px #777;
            color: #333;
        }

        #dq-update {

            float: right;
        }

        #dq-update:hover {
            opacity: 0.7;
        }

        .pager {
            font-size: 14px;
        }

        .pager a, .pager span {
            display: inline-block;
            padding: 3px 6px;

        }

        .pager .cur {
            background-color: #999999;
            color: #FFFFFF;
        }

        .pager a {
            text-decoration: none;
        }

        .pager a:hover {
            text-decoration: none;
        }

        .pager a:hover {
            padding: 2px 5px;
            background-color: #EBEBEB;
            border: 1px solid #DDDDDD;
        }

        #toTop {
            /*background: rgba(69,104,142, 0.2);*/
            /*background: rgba(0,0,0, 0.1);*/
            display: none;
            position: fixed;
            /*width: 100px;*/
            /*top: 0;*/
            bottom: 10px;
            left: 10px;
            /*color:#45688E;*/
            color: #fff;
            text-decoration: none;
            font-weight: bold;

            text-align: center;
            /*display: block;*/
            font-size: 12px;
            padding: 16px 20px;
            border-radius: 2px;
            background: rgba(0, 0, 0, 0.28);
            border: 1px solid #848484;
            z-index: 1;
        }

        #toTop:hover {
            /*background: rgba(69,104,142, 0.3);*/
            /*background: linear-gradient(to top, rgba(107, 109, 255, 0.8), rgba(157, 159, 249, 0.8));
    border-color: rgba(107, 109, 255, 0.8);*/
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #555;
        }

        /*#toTop span {
	text-align: center;
	display: block;
	font-size: 12px;
	padding: 5px 10px;
	background: rgba(0,0,0, 0.5);
}*/

        .download-part > a {
            background: url(bg-gray.gif);
            padding: 10px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            color: white;
            position: relative;
        }

        .download-part > a span {
            display: none;

        }

        .download-part > a:hover {
            color: white;
            background: #cc0000;
            text-decoration: none;
        }

        .download-part > a:hover span {
            position: absolute;
            display: inline-block;
            width: 400px;
            background: #cc0000;
            padding: 10px 10px 10px 10px;
            top: 36px;
            left: 0;
            z-index: 2;
        }

        .dogovor_content h2, .dogovor_content h3, .dogovor_content h4 {
            color: #000;
            background: none;
            padding: 0;
            text-transform: none;
            font-weight: bold;
        }

        .dogovor_content h2 {
            font-size: 18px;
        }

        .dogovor_content h3 {
            font-size: 16px;
        }

        .dogovor_content h4 {
            font-size: 14px;
            font-weight: bold;
            text-align: left;
        }

        .warning-field, input[type="text"].warning-field, input[type="password"].warning-field, textarea.warning-field {
            background: #fff3dd;
            border-color: #cc7e00;
        }

        .error-field, input[type="text"].error-field, input[type="password"].error-field, textarea.error-field {
            background: #ffdddd;
            border-color: #C00;
        }

        #no-comment {
            padding: 0 10px 10px;
            font-size: 18px;
        }

        .bottom-item-menu {
            position: fixed;
            bottom: 0;
            right: 441px;
            z-index: 11;
        }

        .bookmarks, .bottom-item-menu > a {
            background: url(bg-gray.gif);
            padding: 10px;
            font-size: 14px;
            /*font-weight:bold;*/
            text-decoration: none;
            display: inline-block;
            color: white;
            border: 1px solid white;
            border-bottom: none;

        }

        .bottom-item-menu > a span {
            display: none;

        }

        .bookmarks:hover, .bottom-item-menu > a:hover {
            background: #cc0000;
            color: #fff;
            text-decoration: none;
        }

        .bookmarks {
            position: fixed;
            bottom: 0;
            right: 320px;
            display: none;
        }

        .copied {
            position: fixed;
            top: 30%;
            background: #fafafa;
            box-shadow: 0 0 13px #333;
            padding: 10px 10px 30px 10px;
            border-radius: 2px;
            width: 400px;
            z-index: 11;
        }

        .copied h3 {
            background: #585858;
        }

        .copied a {
            color: #990000;
        }

        .copied div {
            padding: 6px 10px 0;
        }

        .edit-table-onsite {
            width: 1px;
        }

        .edit-table-onsite td {
            padding: 4px;
            font-size: 14px;
        }

        .edit-table-onsite .label {
            white-space: nowrap;
            padding-top: 8px;
        }

        .edit-table-onsite .label span {
            font-size: 16px;
            color: #cc0000;
        }

        .notice {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }

        .edit-table-onsite input, .edit-table-onsite select, .edit-table-onsite textarea {
            width: 400px;
            height: auto;
            padding: 4px;
            font-size: 14px;
            color: #333;
        }

        .edit-table-onsite input[type=radio], .edit-table-onsite input[type=checkbox] {
            width: auto;
        }

        .error-notice {
            color: #990000;
            background: #f1e1e1;
            border: #990000 1px solid;
            padding: 10px 12px;
            font-size: 14px;
        }

        .edit-table-onsite .error-label {
            color: #990000;
            font-size: 14px;
        }

        .edit-table-onsite .submit {
            width: auto;
            padding: 10px 15px;
            font-size: 20px;
        }

        #user-panel {
            overflow: hidden;
        }

        .jur-offer {
            font-size: 14px;
            padding: 4px 0 0 4px;
            text-align: right;
        }

        .d-title {
            font-size: 16px;
            white-space: nowrap;
            margin-top: 18px;
        }

        .d-section {
            font-size: 12px;
            color: #333;

        }

        .jur-docs {
            margin: 12px 0 12px 18px;
            overflow: hidden;
        }

        .voteComment {
            display: inline-block;
            width: 16px;
            height: 18px;
        }

        .yesComment {
            background: url(vote_yes.gif) no-repeat 50% 4px;
        }

        .noComment {
            background: url(vote_no.gif) no-repeat 50% 100%;
            margin-bottom: -4px;
        }

        .yesComment:hover, #yesComment + .active {
            background-image: url(vote_yes1.gif);
        }

        .noComment:hover, #noComment + .active {
            background-image: url(vote_no1.gif);
        }

        .comment-panel {
            position: absolute;
            bottom: 6px;
            right: 8px;
            font-size: 14px;
        }

        .comment-panel > span {
            color: #999;
        }

        .rating-vt {
            display: inline-block;
            margin-top: -5px;
            margin-left: 4px;
            /*position: absolute;
    bottom:6px;
    right:8px;
    vertical-align: bottom;*/
        }

        .cr-plus {
            color: green;
            font-weight: bold;
        }

        .cr-minus {
            color: red;
            font-weight: bold;
        }

        .cr-zero {
            color: gray;
        }

        .rating-vt span {
            display: inline-block;
            font-size: 14px;
        }

        .q-item {
            padding-bottom: 12px;
            overflow: hidden;
        }

        .q-info {
            overflow: hidden;
            color: #444;
            padding: 4px 0;
        }

        .q-name {
            float: left;
        }

        .q-name a {
            color: #016101;
        }

        .q-section {
            float: right;
        }

        .q-time {
            margin-left: 8px;
            float: right;
        }

        .q-message {
            margin: 12px 4px 8px 20px;
            font-size: 14px;
            line-height: 160%;
        }

        .q-item h4, h1#q-it-h {
            background: #f6f6f6;
            color: #cc0000;
            font-size: 14px;
            padding: 0;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            font-weight: bold;
        }

        .q-item h4 a, h1#q-it-h {
            color: #b02525;
            display: block;
            padding: 10px 0 10px 10px;
            position: relative;
            text-decoration: none;
        }

        a.q-a-title {
            background: #f7ece1;
            display: block;
            padding: 6px 10px;
            color: #804814;
            font-weight: bold;
            font-size: 16px;
        }

        .q-item h4 a:hover {
            background: #eaeaea;
        }

        a.q-need-answer {
            background: #cc5555;
            color: white;
            padding: 2px 8px 4px 8px;
        }

        a.q-unans {
            float: right;
            background: #DAD29A;
            color: white;
            padding: 4px 8px 6px 8px;
            text-decoration: none;
        }

        a.q-unans:hover {
            background: #E0C400;
        }

        .q-price {
            background: #7EA77E;
            color: white;
            padding: 10px;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
        }

        .q-item h4 a:hover .q-price, h1#q-it-h .q-price {
            background: #4b834b;
        }

        .q-share {
            float: right;
            min-height: 28px;
            margin-top: 4px;
        }

        .q-file {
            float: left;
            margin-top: 10px;
        }

        .q-appeal-text {
            padding: 4px 0 4px 10px;
        }

        .q-jurists {
            overflow: hidden;
            padding-top: 4px;
        }

        .q-jur {
            float: left;
            width: 108px;
        }

        .q-jur a.rjur-photo {
            height: 66px;
            /*line-height: 66px;*/
            overflow: hidden;

        }

        .q-jur a.rjur-photo img {
            vertical-align: middle;
            width: 88px;
        }

        .q-jur .qj-rating {
            display: inline-block;
            padding: 3px 7px;
            width: 32px;
            text-align: center;
            color: #c15555;
            /*font-weight:bold;*/
            border: 1px solid #c15555;
            font-size: 12px;

        }

        .q-jur a.rjur-photo img.rjur-online {
            width: auto;
        }

        .q-jur a.q-pm, .q-jur a.q-consult {
            display: inline-block;
            padding: 3px 3px 4px;
        }

        .q-jur a.q-pm {
            background: #a79b7e;
        }

        .q-jur a.q-pm:hover {
            background: #9e8036;
        }

        .q-jur a.q-consult {
            background: #7EA77E;
        }

        .q-jur a.q-consult:hover {
            background: #2F862F;
        }

        .qc-marked-best {
            background: #7ea77e;
            padding: 6px 10px;
            color: white;
            font-weight: bold;
        }

        .comment-top-right div {
            display: inline-block;
            margin-right: 2px;
        }

        .qc-make-best a {
            display: inline-block;
            padding: 6px 10px;
            background: #b38a54;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .qc-plagiat {
            background: #bbbbbb;
        }

        .qc-plagiat a {
            background: #cc0000;
        }

        .qc-make-best a:hover {
            background: #7ea77e;
            color: white;
        }

        .qc-text-plagiat {
            height: 140px;
            overflow: hidden;
        }

        .qc-best {
            background-color: #458f45;
            color: white;
            font-weight: bold;
            padding: 6px 10px;
        }

        .qc-status {
            padding: 6px 40px;
            color: #fff;
            position: relative;
            background: #458f45;
        }

        .qc-suspective {
            background: #9f5151;
        }

        .qc-confirm-docs {
            background: #458f45;
        }

        .qc-confirm {
            background: #93A000;
        }

        .qc-status span {
            display: none;
            width: 300px;
            padding: 10px 20px;
            background: white;
            border: 1px solid #ccc;
            position: absolute;
            color: #000;
            z-index: 12;
            margin-left: -40px;

        }

        .qc-status:hover span {
            display: block;
        }

        .q-stats {
            width: 100%;
            margin-top: 12px;
        }

        .q-stats td {
            padding: 6px 24px;
            font-size: 16px;
            border: 1px solid #ccc;
        }

        .q-stats-head {
            background: #f7e8b3;
        }

        h2.qh2 {
            background: none;

            color: #333;

            /*color:#333;*/
            padding: 0 0 4px 0;
            font-size: 20px;
        }

        .creator-pane {
            margin-top: 12px;
        }

        .creator-pane .ready {
            background: url(ready.png) no-repeat;
            padding-left: 20px;
        }

        .creator-pane a.q-need-pay {
            background: #C37878;
        }

        .creator-pane a.q-need-pay:hover {
            background: #cc0000;
        }

        .creator-pane a {
            display: inline-block;
            padding: 6px 10px;
            background: #7ea77e;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .creator-pane a:hover {
            background: #166516;
        }

        .comment-warn {
            padding: 10px 20px;
            background: #FFE7C3;
            box-shadow: 0 0 4px #aaa;
            margin-left: 200px;
        }

        .cw-title {
            background: #319669;
            font-weight: bold;
            color: #fff;
            padding: 4px 12px;
            text-align: center;
        }

        .search-select {
            margin: 6px 0 0 4px;

        }

        .search-select select {
            width: 304px;
            padding: 4px;
        }

        .rss {
            float: right;
            padding: 2px 0 2px 24px;
            background: url(rss_6450.png) no-repeat 0 2px;
            background-size: 20px;
            font-size: 16px;
        }

        .jur-sign {
            /*margin:4px 4px 0 4px;*/
            border-top: 1px solid #EEEDDD;
            padding: 12px 8px;
            overflow: hidden;
            background: /*#FFFEE7*/ #F3FDEF;
            font-size: 12px;
        }

        a.jur-sign-tnx {
            float: right;
            display: block;
            padding: 6px 8px;
            background: #b8935c;
            color: white;
            font-weight: bold;
            text-decoration: none !important;
            border-radius: 2px;
            font-size: 13px;
        }

        a.jur-sign-tnx i {
            display: inline-block;
            width: 11px;
            height: 16px;
            background: url(tnx_r.gif) no-repeat;
            vertical-align: top;
        }

        a.jur-sign-tnx:hover i {
            background-position: -11px 0;
        }

        a.jur-sign-tnx:hover {
            background: #b56e04;
        }

        .jur-connect {
            margin-top: 12px;
            margin-left: 200px;
            border-left: 10px solid /*#C17C53*/ #EFAF89;
            padding: 6px 10px;
            background: #FFEEE4;
            overflow: hidden;
        }

        .jur-connect tr {
            border-bottom: 1px solid #CEC8C4;
        }

        .jur-connect tr:nth-last-child(1) {
            border: none;
        }

        .jur-connect td {
            font-size: 12px;
            padding: 6px 6px 0 0;
        }

        .jur-connect td:nth-child(1) {
            text-align: right;
        }

        .jurc-title {
            font-size: 13px;
            font-weight: bold;
            /*margin-bottom: 4px;*/
            /*border-bottom: 1px solid #C17C53;*/
        }

        #commentTo {
            font-size: 12px;
            color: green;
            font-weight: bold;
            margin-top: 12px;
        }

        #commentTo a {
            text-decoration: none;
        }

        #right_column {
            float: left;
            width: 250px;
            margin-left: -250px;
        }

        #right_column h4 {
            /*width:230px;*/
        }

        /*#right_column a {
	text-decoration: underline;
}*/

        #right_column .block {
            /*border-top-left-radius: 4px;*/
            overflow: hidden;
            /*border-left: 1px solid #ccc;*/
        }

        /*#left_column .block {
    border-right: 1px solid #ccc;
	border-top-right-radius: 4px;
}*/

        /*.rjur a {
	color:#990000;
}*/

        .rjur-item {
            padding-left: 4px;
            margin-bottom: 4px;
            padding-bottom: 8px;
            /*border-bottom:1px dotted #999;*/
            border-bottom: 1px solid #dfd4e6;

            overflow: hidden;
        }

        .rjur .rjur-item:nth-last-child(1) {
            border-bottom: none;
        }

        .rjur-photo {
            display: block;
            float: left;
            background: white;
            border: 1px solid #CCCCCC;
            padding: 2px;
            position: relative;
            max-height: 60px;
            min-height: 50px;
            overflow: hidden;
        }

        .rjur-label {
            width: 72px;
            display: inline-block;
            text-align: right;
        }

        .rjur-photo img {
            width: 66px;

        }

        /* TODO: ÑÐ¾ Ð²Ñ€ÐµÐ¼ÐµÐ½ÐµÐ¼ ÑƒÐ±Ñ€Ð°Ñ‚ÑŒ ÑÑ‚Ð¾
ÑÐ¼... Ð Ð·Ð°Ñ‡ÐµÐ¼? Ð¥Ð¾Ñ‚ÑŒ Ð±Ñ‹ Ð¿Ð¾Ð´Ð¿Ð¸ÑÐ°Ð»Ð¸, Ð´Ð»Ñ Ñ‡ÐµÐ³Ð¾ ÑƒÐ±Ð¸Ñ€Ð°Ñ‚ÑŒ
*/
        img.rjur-online {
            position: absolute;
            bottom: 4px;
            left: 4px;
            width: auto;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            border: 1px solid #ccc;
            padding: 1px;
        }

        div.rjur-onl-status {
            position: absolute;
            /*background: rgba(0, 255, 31, 0.75);*/
            height: 14px;
            bottom: 0;
            left: 2px;
            /*border-top: #009B13 1px solid;*/
            right: 2px;
            text-align: center;
            color: #FFF;
            font-size: 11px;
        }

        div.rjur-online {
            background: rgba(0, 129, 16, 0.9);
            border-top: rgba(0, 78, 10, 0.9) 1px solid;
        }

        div.rjur-offline {
            /*background: rgba(129, 74, 74, 0.9);
    border-top: rgba(124, 70, 70, 0.9) 1px solid;
    color: #E0E0E0;*/
            /*background: rgba(175, 130, 130, 0.9);
    border-top: rgba(168, 110, 110, 0.9) 1px solid;
    color: #F3F3F3;*/
            background: rgba(197, 197, 197, 0.9);
            border-top: rgba(152, 152, 152, 0.9) 1px solid;
            color: #F3F3F3;
            display: none;
        }

        .rjur-info {
            margin-left: 76px;
        }

        .rjur-info div {
            margin-top: 4px;
        }

        .rjur-item {
            overflow: hidden;
            margin-top: 4px;
            padding-top: 4px;
        }

        .rjur-letter a {
            background: #eff9ed;
            padding: 4px 12px 4px 12px;
            display: block;
            color: #009451;
            text-decoration: none;
            width: 100px;
            text-align: center;
        }

        .rjur-letter a:hover {
            background: #389E2B;
            color: white;
        }

        .rjur-email {
            margin-top: 2px;
        }

        /*.rjur-email a {
	color:#1B4C81;
}*/

        .rjur-name {
            /*font-weight:bold;*/
            font-size: 13px;
        }

        a .rcode-n {
            color: #990000;
        }

        /*a:hover .rcode-n {
	color:white;
}*/

        /*.codex-modified {
	float:right;
	font-size:12px;
	font-weight:bold;
	padding-top:4px;

}*/

        .codex-info {
            overflow: hidden;
            margin-top: 12px;
        }

        .codex-info li {
            float: left;
            font-size: 12px;
            font-weight: bold;
            padding-top: 4px;
            margin-left: 12px;
        }

        a .ransw-name {
            color: #006600;
        }

        /*a:hover .ransw-name {
	color:white;
}*/

        .jur-left ul li a {
            /*display: block;
    font-weight: bold;
    font-size: 14px;
    padding: 12px 0 8px 18px;
    color:#404040;
    background:url(bullet_category.gif) 8px 14px no-repeat;
    border-bottom: 1px solid #DFDEDE;*/
            display: block;
            font-size: 14px;
            padding: 8px 0 8px 18px;
            color: #404040;
            background: url(bullet_category.gif) 8px 14px no-repeat;
            border-bottom: 1px solid #DFDEDE;
        }

        .jur-left ul li a:hover, .jur-left ul li.selected a {
            /*color:#cc0000;*/
            color: #fff;
            /*background: #7E7E7E;*/
            background: #8b99bb;
            border-bottom-color: #6F6F6F;
            text-decoration: none;
        }

        .jur-left {
            padding: 12px 4px 4px 12px;
        }

        /***** Ð´Ð¸Ð°Ð»Ð¾Ð³Ð¸ *****/

        .dialogs2 {
            /*margin-bottom:12px;
    padding-bottom:5px;*/
            /*padding: 0 0 5px 4px;*/
            max-height: 400px;
            overflow-y: auto;
            border-bottom: 1px solid #ccc;
        }

        .d2-start {
            color: #999;
            padding-left: 100px;
            font-size: 14px;
        }

        .d2-img {
            float: left;
            max-height: 40px;
            overflow: hidden;
            border-radius: 4px;
        }

        .d2-img, .d2-img img {
            width: 36px;
        }

        .d2-stime {
            float: left;
            padding: 10px 0 0 7px;
            color: #ddd;
            font-size: 11px
        }

        .d2-item.extended .d2-stime {
            padding-top: 25px;
        }

        .d2-item:hover .d2-stime {
            color: #999;
        }

        .d2-time {
            font-size: 11px;
            color: #999;
            white-space: nowrap;
        }

        .d2-message {
            margin: 0 10px 0 44px;
            font-size: 14px;
            resize: none;
            overflow: hidden;
        }

        .d2-message p {
            min-height: 16px;
            line-height: 150%;
        }

        .d2-item {
            overflow: hidden;
            padding: 0 4px 4px 4px;
            background: #fff;
        }

        /*.d2-item.d2-isme {
	border-color: #eef2f5;
}*/

        .d2-unread {
            background: #EDF1F5;
        }

        .dialogs2 .extended {
            padding: 8px 4px 4px 4px;
            /*margin-top: 8px;*/
        }

        .d2-typing {
            height: 16px;
            margin-top: 6px;
        }

        .d2-buttons > a {
            display: inline-block;
            padding: 6px 10px;

            color: white;
            font-weight: bold;
            text-decoration: none !important;
        }

        .d2-sm {

        }

        #d2-show-more {

            height: 35px;
        }

        #d2-show-more a {
            display: block;
            padding: 10px;
            text-align: center;
            background: #eee;
        }

        a.d2-bpay {
            background: #7ea77e;
        }

        a.d2-bpay:hover {
            background: #2F862F;
        }

        a.d2-file {
            background: #A79B7E;
        }

        a.d2-file:hover {
            background: #9E8036
        }

        #d2-fupload {
            position: absolute;
            background: #eee;
            border: 1px solid #999;
            border-radius: 4px;
            margin: -150px 0 0 130px;
        }

        #d2-fupload h3 {
            padding: 6px 20px;
        }

        #d2-progress progress {
            width: 100%;
            height: 20px;
        }

        .d2-close {
            color: #fff;
            float: right;
            font-size: 30px;
            text-decoration: none !important;
            margin-top: -7px;
        }

        .d2-consult-ico {
            float: left;
            width: 58px;
            background: #eee;
            border: 1px solid #ccc;
            text-align: center;
        }

        .d2-file-ico {
            float: left;
            width: 58px;
            background: #eee;
            border: 1px solid #ccc;
            text-align: center;
        }

        #d2-typ {
            color: #888;
            margin-left: 70px;
            background: url(typing.gif) no-repeat 0 50%;
            padding-left: 18px;
        }

        .d-img {
            float: left;
            width: 60px;
            max-height: 70px;
            overflow: hidden;
        }

        .d-img img {
            width: 60px;
        }

        .d-info {
            float: left;
            width: 140px;
            margin-left: 10px;
        }

        .d-message {
            margin-left: 220px;
        }

        .d-item {
            overflow: hidden;
            padding: 12px 4px;
            border-bottom: 1px solid #ccc;

        }

        .d-item:hover {
            cursor: pointer;
            background: #dee5ed !important;
        }

        .d-online {
            color: #999;
            margin-top: 4px;
        }

        .d-time {
            color: #777;
            font-size: 11px;
            margin-top: 2px;
        }

        a.d2-name {
            text-decoration: none;
            font-weight: bold;
            /*color:#990000;*/
            font-size: 12px;
            color: #b40606;
        }

        .d2-isme a.d2-name {
            color: #0645ad;
        }

        a.d2-name:hover {
            text-decoration: underline;
            color: #cc0000;
        }

        #d2jc-online {
            display: inline-block;
            background: #30a030;
            padding: 2px 8px;
            color: #fff;
            font-size: 14px;
            white-space: nowrap;
        }

        #d2jc-offline {
            color: #999;
            font-size: 14px;
            white-space: nowrap;
        }

        .dialog-wrap {
            overflow: hidden;
        }

        #dialog-col1 {
            width: 282px;
            float: left;
            margin: 0 4px;
            /*box-shadow: 0 0 2px #000;
    background: #fafafa;
    border-radius: 2px;*/
            background: #fafafa;
            border: 1px solid #eee;
        }

        #dialog-col2 {
            margin-left: 296px;
            background: #fff;
        }

        #dialog-col2 #dc2-expand:after {
            content: "[Ñ€Ð°Ð·Ð²ÐµÑ€Ð½ÑƒÑ‚ÑŒ]"
        }

        #dialog-col2 #dc2-expand {
            float: right;
            font-size: 11px;
        }

        #dialog-col2.expanded #dc2-expand:after {
            content: "[ÑÐ²ÐµÑ€Ð½ÑƒÑ‚ÑŒ]"
        }

        #dialog-col2.expanded {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 960px;
            left: 50%;
            right: 0;
            padding: 20px;
            margin-left: -500px;
            z-index: 2;
            display: table;
            height: 100%;
        }

        #dialog-col2.expanded .d2-footer, #dialog-col2.expanded .d2-header {
            display: table-row;
        }

        #dialog-col2.expanded .d2-middle {
            display: table-row;
            height: 100%;
        }

        #dialog-col2.expanded #dialog {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            max-height: none;
        }

        #dialog-col1 .d-img img, #dialog-col1 .d-img {
            width: 36px;
        }

        #dialog-col1 .d-info {
            width: auto;
            float: none;
            margin-left: 40px;
            overflow: hidden;
        }

        #dialog-col1 .selected {
            background: #dee5ed !important;
        }

        #dialog-col1 .d-info2 {
            float: right;
            /*margin-left: 4px;*/
        }

        #dialog-col1 .d-online {
            margin-top: 0;
            font-size: 11px;
        }

        #dialog-col1 .d-message {
            margin: 4px 0 0 40px;
            font-size: 10px;
            color: #333;
        }

        .d-cl-name {
            white-space: nowrap;
            width: 174px;
            display: block;
            overflow: hidden;
        }

        #dialog-col1 .d-item {
            padding: 6px 4px;
        }

        /********** address */

        .ad-select {
            margin-bottom: 12px;
            font-size: 18px;
            color: #333;
        }

        .ad-select select {
            font-size: 16px;
            padding: 4px;
            height: auto;
            color: #333;
        }

        .ad-list li {
            padding: 8px 0 6px 0;
            border-bottom: 1px dotted #ccc;
        }

        .ad-name a {
            font-size: 16px;
            /*font-weight:bold;*/
            color: #cc0000;
        }

        .ad-more a {
            color: #007000;
        }

        .ad-address, .ad-phone, .ad-site {
            margin-top: 4px;
        }

        .ad-sc {
            margin-top: 4px;
        }

        .ad-sc div {
            display: inline-block;
        }

        .ad-city a, .ad-section a {
            color: #660000;
        }

        .ad-city {
            width: 150px;
        }

        .ad-bottom-menu > a span {
            display: block;
            background: #b46969;
        }

        .ad-bottom-menu > a:hover span {
            background: #cc0000;
        }

        .ad-bottom-menu a.darken {
            background: #b46969;
        }

        .ad-bottom-menu a.darken:hover {
            background: #cc0000;
        }

        .ad-bottom-menu a.ad2-edit {
            position: relative;
        }

        .ad-bottom-menu a.ad2-edit b {
            bottom: 36px;
            top: auto;
            font-size: 12px;
        }

        /*.ad2-intro, .ad2-info {
	font-size:12px;

}*/

        .ad2-intro {
            line-height: 150%;
            width: 300px;
            margin-top: 2px;
            font-size: 12px;
        }

        .ad2-info {
            /*width:340px;*/
        }

        .ad2-info h2 {
            margin-top: 0 !important;
        }

        .ad2-inner {
            width: 100%;
        }

        .ad2-inner tr {
            border-bottom: 1px solid #ccc;
        }

        .ad2-inner td {
            padding: 14px 0 15px 10px;
        }

        .ad2-inner td:nth-child(1) {
            white-space: nowrap;
        }

        #ad2-map {
            height: 400px;
        }

        a.ad-ch {
            width: 262px;
        }

        .ad2-item {
            float: left;
            width: 315px;
            margin-right: 10px;
        }

        .ad2-users {
            overflow: hidden;
        }

        .ad2-arr {
            margin: -12px 150px 0 150px;
            text-align: center;
            width: 350px;
            position: absolute;
            z-index: 11;
        }

        .ad2-edit {
            padding: 10px 10px 10px 10px;
            background: url(bg-gray.gif);
            display: inline-block;
            position: relative;
        }

        a.ad2-edit:hover {
            background: #cc0000;
        }

        .ad2-descr {
            overflow: hidden;
            padding: 10px 18px;
            line-height: 150%;
        }

        .d2-type-form {
            margin-top: 6px;
        }

        .d2-textarea {
            margin-left: 70px;
        }

        .d2-textarea textarea {
            /*width: 500px;*/
            width: 95%;
            height: 63px;
            color: #000;
            line-height: 150%;
        }

        .ad-vip {
            background: #fffadb url(favorite.png) no-repeat 10px 10px;
            padding: 10px 10px 10px 34px !important;
            margin-top: 6px;
        }

        h4.lighter {
            margin-bottom: 0;
            margin-top: 12px;
            background: none;
            border-bottom: 1px solid #DFDEDE;
            color: #aa0000;
            font-size: 16px;
            padding: 0 0 4px 16px;
        }

        #noteAnswer {
            position: absolute;
            bottom: auto;
        }

        #banner {
            border-bottom: 4px solid #999;
            height: 90px;
            background: #475c8e url(bg/pattern_017_3.png);
        }

        #banner > div {
            width: 956px;
            margin: 0 auto;
            position: relative;
        }

        .search-add {
            margin-bottom: 12px;
            background: #fafafa;
            border-left: #ddd 10px solid;
            padding: 6px 10px 12px 20px;
        }

        .search-codex-add > li {
            font-size: 16px;
            font-weight: bold;
            padding-top: 12px;
        }

        .search-codex-add > li ul {
            margin-left: 12px;
        }

        .search-codex-add > li li {
            font-size: 12px;
            font-weight: normal;
            padding-top: 6px;

        }

        .search-codex-add ul {
            max-height: 90px;
            overflow: hidden;
        }

        .search-amounts-add li {
            font-size: 14px;
            padding-top: 6px;
        }

        .search-code-exp {
            padding-left: 12px;
            font-size: 14px;
        }

        /***************** federalies ******/

        .fedlaw-index {
            overflow: hidden;
        }

        .fedlaw-index li {
            float: left;
            width: 160px;
            font-size: 18px;
        }

        .fedlaw-list {
            margin-left: 10px;
        }

        .fedlaw-list li {
            font-size: 14px;
            padding: 6px 0 6px 12px;
            background: url(bullet_category.gif) no-repeat 0 12px;
        }

        /***************** notes ************/

        .note-list {
            border-top: 1px solid #eaeaea;
            margin-top: 6px;
        }

        .note-item {
            padding: 10px 4px;
            border-bottom: 1px solid #eaeaea;
            overflow: hidden;
        }

        .note-item:hover {
            background: #DEE5ED !important;
            cursor: pointer;
        }

        .nc-item {

        }

        .nc-img {
            float: left;
            width: 60px;
        }

        .nc-img img {
            width: 60px;
        }

        .nc-info {
            margin-left: 70px;
        }

        .nc-sub {
            color: #777777;
            font-size: 11px;
            margin-top: 2px;
        }

        .nc-sub a {
            color: #526979;
        }

        .nc-comment {
            padding: 6px 0 4px 0;
        }

        .nr-img {
            float: left;
            width: 42px;
        }

        .nr-img img {
            width: 42px;
        }

        .nr-rating {
            float: left;
            width: 60px;
            font-size: 24px;
            font-family: "Courier New";
            font-weight: bold;
            position: relative;
        }

        .nr-rating div {
            float: right;
            padding: 1px 2px;
            text-align: center;
            background: #ccc;

        }

        .nr-plus div {
            background: #8db978;
            color: #fff;
        }

        .nr-minus div {
            background: #c47777;
            color: #fff;
        }

        .nr-in2 {
            overflow: hidden;
            padding: 8px 0 4px;
        }

        .nr-comment {
            padding: 0 0 4px 0;
            margin-left: 52px;
        }

        .nb-logo {
            float: left;
            width: 60px;
        }

        .nb-logo div {
            background: #458f45;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            position: relative;
            float: right;
            padding: 8px;
        }

        .ncons-ico {
            float: left;
            width: 60px;
            font-size: 24px;
            font-family: "Courier New";
            font-weight: bold;
            position: relative;
        }

        .ncons-ico div {
            float: right;
            padding: 0;
            text-align: center;
            background: #eee;
            border: 1px solid #ccc;

        }

        /************** blog ***************/

        /*.blog-content h2, .blog-content h3, .blog-content h4 {
	color:#990000;
}

.blog-content h2 {
	font-size: 17px;
	font-weight: normal;
	margin-top:20px;
}

.blog-content h3 {
	font-size: 14px;
	font-weight: normal;
}

.blog-content h4 {
	font-size: 13px;
	color: #005099
}



.blog-content .dogovor_content p, .blog-content .dogovor_content li {
	font-size: 14px;
	line-height: 160%;
}

.blog-content .dogovor_content li {
	padding-top:6px;
}*/

        /******* note-box **********/

        .nbox-img {
            float: left;
            width: 60px;
        }

        .nbox-img img {
            width: 60px;
        }

        .nbox-info {
            margin-left: 70px;
            color: #fff;
        }

        .nbox-info h4 {
            font-weight: bold;
            font-size: 12px;
        }

        .nbox-message {
            margin-top: 4px;
        }

        .nbox-item {
            border-radius: 2px;
            background: rgba(60, 60, 60, 0.95);
            overflow: hidden;
            width: 280px;
            height: 60px;
            padding: 12px;
            margin-bottom: 6px;
        }

        .nbox-item a {
            text-decoration: none !important;
        }

        #note-box {
            bottom: 0;
            left: 6px;
            position: fixed;
            z-index: 11;
        }

        .nbox-close {
            float: right;
            background: #333;
            color: #ccc;
            display: block;
            width: 16px;
            height: 16px;
            padding: 1px;
            border-radius: 2px;
            text-align: center;
        }

        .nbox-close:hover {
            color: #ccc;
            background: #222;
        }

        /*****************     payments          ****************/
        .pay-menu a {

        }

        /**************** judge ******************/

        .judge-table {
            width: 100%;
            margin: 12px 0;
        }

        .judge-details table td {
            padding: 4px;
        }

        .judge-table td {
            border: 1px solid #ccc;
            padding: 8px 6px;
        }

        /*.judge-borderless {
	margin:6px 10px;
}*/

        .judge-borderless td {
            border: none;
            padding: 6px 4px;
        }

        .judge-table .head {
            background: #eee;
        }

        .judge-table tr:hover {
            background: #f5f5f5;
        }

        .judge-table ul {
            margin-top: 8px;
        }

        .judge-table ul li {
            padding: 4px 0;
        }

        .jp-type {
            margin-top: 6px;
            font-size: 12px;
        }

        .jp-type a {
            color: #0000cc;
            text-decoration: none;
        }

        .jp-type a:hover {
            text-decoration: underline;
            color: #00ABCC;
        }

        .judge-table ul a {
            color: #1B4C81;
            text-decoration: none;
        }

        .judge-table ul a:hover {
            text-decoration: underline;
        }

        .judge-text {
            padding: 20px;
            border: 1px dotted #ccc;
        }

        .judge-text p {
            text-indent: 20px;
            font-size: 14px;
            line-height: 160%;
            text-align: justify;
        }

        .judge-text h2, .judge-text h3, .judge-text h4 {
            background: none;
            color: #333;
            padding: 0;
            text-align: center;
            font-weight: bold;
        }

        .judge-text a {
            text-decoration: underline;
        }

        .judge-text a:hover {
            text-decoration: none;
        }

        .jp-decision {
            display: inline-block;
            padding: 4px 6px;
            color: #fff;
            margin-top: 4px;
        }

        .jp-dec-positive {
            background: #65A365;
        }

        .jp-dec-negative {
            background: #DF5050;
        }

        .jp-category {
            margin-top: 4px;
        }

        .jp-category, .jp-category a {
            color: #777;
        }

        .jp-2 {
            font-size: 11px;
            color: #333;
        }

        .jp-date {
            margin-top: 5px;
        }

        .judge-info {
            width: 100%;
        }

        .judge-info td {
            padding: 4px;
            font-size: 14px;
        }

        .judge-search {
            border: 1px solid #ccc;
            background: #f0f0f0;
        }

        .judge-search h4 {
            color: #444;
            background: #eaeaea;
            padding: 6px 10px;
            margin: 2px 0;
        }

        .judge-search .edit-table-onsite {
            margin: 4px 6px 10px 6px;
        }

        .judge-private {
            margin: 20px 0;
            padding: 15px;
            background: #F6F4E8;
            border: 1px solid #AF7C29;
            font-size: 14px;

        }

        ul.docs {
            line-height: 32px;
            font-size: 16px;
            list-style: none;
            margin-left: 40px;
        }

        ul.docs li a {
            display: inline-block;
            background: url(/images/word.jpg) 0 2px no-repeat;
            padding-left: 20px;
            line-height: 18px;
        }

        #tmfooterlinks div.sf-descr {
            width: 500px;
            /*font-size: 14px;*/
        }

        #tmfooterlinks div.sf-descr p {
            margin-top: 6px;
            padding: 0;
        }

        /****        LK  ******/

        ul.lk-main {
            max-width: 300px;
        }

        ul.lk-main li a {
            display: block;
            font-weight: bold;
            font-size: 14px;
            padding: 8px 0 8px 18px;
            color: #404040;
            background: url(bullet_category.gif) 8px 14px no-repeat;
            border-bottom: 1px solid #DFDEDE;
            position: relative;
            text-decoration: none;
        }

        ul.lk-main li a:hover {
            color: #cc0000;
            text-decoration: underline;
        }

        #askRight textarea {
            width: 240px;
            height: 80px;
        }

        #askRight input {
            margin-top: 6px;
            width: 252px;
            padding: 10px 0;
            font-size: 18px;
        }

        #askRight input {
            color: #fff;
            background: #c00;
            border: none;
            border-radius: 4px;
        }

        #askRight:hover input {
            background: #F00;
            cursor: pointer;
        }

        /** calc **/

        .calculators {
            width: 940px;
            margin: 0 auto;
            position: relative;
        }

        a.calc-base {
            width: 400px;
            padding: 4px;
            margin-top: 4px;
            background: #f0f0f0;
            box-shadow: 0 0 2px #333;
            float: left;
            margin-right: 20px;
            text-decoration: none;
        }

        .cb-title {
            font-size: 20px;
        }

        .calc-pane {
            width: 904px;
            overflow: hidden;
            margin: 0 auto;
        }

        #calc-pane2 {
            width: 20000px;
        }

        .calc-item {
            float: left;
            width: 904px;
            overflow: hidden;
            height: 90px;
        }

        .calc-arr {
            position: absolute;
            top: 0;
            bottom: 0;

            /*border: 1px solid #ccc;*/
            width: 20px;
            text-align: center;
            padding: 20px 0 4px;
            color: #CCC;
            font-size: 32px;
        }

        .calc-arr:hover {
            background: #f0f0f0;
        }

        #calc-left {
            left: 0;
            padding-right: 4px;
            padding-left: 2px;

        }

        #calc-left span {
            background: url(igs_l.png) no-repeat -13px 50%;
        }

        #calc-left:hover span {
            background-position: 0 50%;
        }

        .calc-arr span {
            width: 13px;
            display: block;
            height: 59px;
            margin: 0 auto;
        }

        #calc-right {
            right: 0;
            padding-left: 4px;
            padding-right: 2px;
        }

        #calc-right span {
            background: url(igs_r.png) no-repeat 0 50%;
        }

        #calc-right:hover span {
            background-position: -13px 50%;
        }

        .jur-note {
            font-size: 11px;
            padding-left: 6px;
            /*border-left: 6px solid #888;*/
            margin-top: 8px;
        }

        .art-part {
            font-weight: bold;
            font-size: 14px;
            background-color: #E0ECF9;
            display: inline-block;
            color: #2a527d;
            padding: 0 6px;
            border-radius: 4px;
            border: 1px solid #96bbe4;
        }

        a.codex-art-part {
            position: static;
            margin-top: 0;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
        }

        a.codex-art-part:hover {
            color: #ff0000;
        }

        .codex-art-parts a {
            display: inline-block;
            padding: 2px 6px;
            border: 1px solid #ccc;
            text-decoration: none;
            border-radius: 2px;
            font-size: 14px;
        }

        .codex-art-parts a:hover {
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-color: #000;
        }

        #codex-search {
            padding: 28px 0;
        }

        #codex-search.codex-search-fixed {
            position: fixed;
            top: 5px;
            z-index: 1;
            background: #fafafa;
            box-shadow: 0 0 1px #000;
            padding: 20px 0 10px;
            border-radius: 4px;
            /*padding: 0 0 4px;*/
        }

        .dq-phones, .dq-phones:hover {
            font-weight: bold;
            font-size: 14px;
            line-height: 160%;
            color: #000;
            top: 10px;
            height: 86px;
            overflow: hidden;
        }

        .dogovor-quote table td {
            color: #0063CC;
            font-size: 18px;
            font-family: 'Times New Roman', serif;
        }

        .dogovor-quote table td:nth-child(1) {
            text-align: right;
            padding-right: 6px;
        }

        /*.dogovor-quote table tr:nth-child(3) td {
	color:#990000;
}*/

        .mobile-phones {
            padding: 6px 14px;
            display: none;
        }

        .mobile-phones, .mobile-phones td {
            font-size: 16px;
        }

        .mobile-phones a {
            color: blue;
        }

        #footer2 {
            padding: 10px 50px 0;
            overflow: hidden;
        }

        .plate-cover {
            /*box-shadow: 0 1px 2px #999;
    border-radius: 2px;
    overflow: hidden;
    margin-top: 6px;
    background: #fafafa;*/
            border-radius: 2px;
            overflow: hidden;
            margin-top: 6px;
            background: #fcfcfc;
            box-shadow: 0 1px 4px #ccc;
        }

        .plate-cover h2 {
            margin-top: 0;
            color: #000f80;
            /*background: #dbdfff;
    border-bottom: 1px solid #8e93b7;*/
            background: #f4f4f9;
            border-bottom: 1px solid #c2c6dc;
        }

        .plate-cover h2 span {
            /*background: #656fbd;*/
            /*background: #8b99bb;*/
        }

        .plate-cover .q-jurists {
            padding: 8px;
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
        }

        #footer-info {
            width: 400px;
            float: left
        }

        .codex-leave-comment .clc-first {
            width: 250px;
            padding-right: 10px;
            text-align: center
        }

        /***************************************/

        @media screen and (max-width: 1360px) {
            #wrapper3 {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        @media screen and (max-width: 1200px) {
            #right_column {
                display: none;
            }

            #wrapper1 {
                min-width: 928px;
            }

            #wrapper3 {
                /*margin: 20px auto 40px;
        width: 960px;*/
            }

            #top-menu {
                /*width: 960px;*/
            }

            #columns {
                /*width: 950px;*/
            }

            /*#center_column {
        margin-right: 10px;
    }*/
            #content-part {
                margin-right: 10px;
            }

            /*.dogovor-quote {
        display: none;
    }*/
            #footer2 .dq-phones {
                display: block;
            }

            #top-menu a {
                text-transform: none;
            }

            .dragged {
                display: none;
            }

            .bottom-item-menu {
                right: 100px;
            }

            #tmfooterlinks div.sf-descr {
                width: 390px;
            }
        }

        @media screen and (max-width: 1100px) {
            #info_block_top ul li a {
                max-width: 60px;
            }

            div#search_block_top input.search_query {
                width: 148px;
            }

            #search_block_top {
                padding-right: 6px;
            }
        }

        @media screen and (max-width: 960px) {
            #left_column {
                display: none;
            }

            #banner {
                display: none;
            }

            #wrapper1 {
                min-width: 690px;
            }

            #top-menu a {
                padding: 5px;
            }

            #content-part {
                float: none;
                margin: 0 10px;
            }

            #wrapper3 {
                /*width: 690px;*/
            }

            #top-menu {
                /*width: 690px;*/
            }

            /*#columns {
        width: 680px;
    }*/
            /*#center_column {
        margin-left: 10px;
    }*/
            #info_block_top ul li.favorite {
                display: none;
            }

            #tmfooterlinks div.sf-descr {
                width: auto;
            }

            /*div#search_block_top input.search_query {
        width:270px;
    }*/
            div#search_block_top select {
                display: none;
            }

            .dogovor-quote {
                display: none;
            }

            .mobile-phones {
                display: block;
            }

            #info_block_top ul li.user a {
                max-width: 270px;
            }

            div#search_block_top input.search_query {
                width: 300px;
            }
        }

        @media screen and (max-width: 745px) {

            body {
                background: none;
            }

            #wrapper1 {
                min-width: 320px;
            }

            #footer-info {
                width: auto;
            }

            #footer2 .dq-phones {
                display: none;
            }

            #wrapper3 {
                width: auto;
                margin: 0;
                box-shadow: none;
                border: none;
            }

            #header_slogan {
                display: none;
            }

            /*#top-menu {
        width: 100%;
        background: #535353;
        margin: 0;
    }*/
            #info_block_top ul li.user a {
                padding: 4px 8px;
                /*max-width: 106px;*/
                background-image: none;
            }

            div#search_block_top select {
                display: block;
            }

            #top-menu a {
                padding-top: 5px;
                font-size: 14px;
            }

            div#search_block_top input.search_query {
                width: 192px;
            }

            /*#columns, #center_column {
        width: auto;
    }*/
            #content-part {
                margin: 0 5px 40px 5px;
            }

            #columns {
                padding: 0;
            }

            .breadcrumb {
                font-size: 14px;
                padding-top: 10px;
                line-height: 150%;
            }

            .breadcrumb a, .breadcrumb span.navigation_page {
                white-space: normal;
            }

            #banner {
                display: none;
            }

            div#header, #columns, #columns2 {
                background: #fff;
            }

            #columns2 {
                padding-top: 10px;
                overflow: visible;
            }

            #header_logo {
                position: static;
                padding: 6px 0 6px 10px;
                display: block;
                width: auto;
                font-size: 14px;
            }

            #info_block_top {
                float: none;
                padding: 10px;
            }

            .jur-connect {
                margin-left: 0;
            }

            #search_block_top form {
                padding: 0;
            }

            #search_block_top {
                float: none;
                padding: 0 10px;
                margin: 0;
            }

            #header_right {
                height: 90px;
            }

            #dialog-col1 {
                display: none;
            }

            #dialog-col2 {
                margin-left: 0;
            }

            #nyLogo {
                left: 180px !important;
                top: 0 !important;
                /*display:none;*/
            }

            .mobile-phones {
                text-align: left;
            }
        }

        @media screen and (max-width: 500px) {
            div#search_block_top select {
                display: none;
            }

            #info_block_top ul li.user a {
                max-width: 106px;
            }

        }

        @media screen and (max-width: 370px) {

            .q-user-card {
                float: none;
                width: auto;
                overflow: hidden;
            }

            .comment-name {
                width: auto;
            }

            .comment-photo a, .comment-photo img {
                width: 76px;
            }

            .comment-photo a {
                float: left;
                margin-right: 4px;
            }

            .comment-time {
                margin-left: 6px;
            }

            .comment-jur {
                margin-left: 90px;
            }

            .comment-top-right {
                right: 15px;
                top: 10px;
            }

            a.jur-sign-tnx {
                float: none;
                text-align: center;
            }

            .jur-sign ul {
                margin-top: 6px;
            }

            .search-section-pane input[type=text] {
                width: 200px;
            }

            .codex-leave-comment .clc-first {
                width: auto;
                padding: 0;
            }

            .codex-leave-comment td {
                display: block;
            }
        }


        /** */

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        h4 {
            display: block;
            -webkit-margin-before: 1.33em;
            -webkit-margin-after: 1.33em;
            -webkit-margin-start: 0;
            -webkit-margin-end: 0;
            font-weight: bold;
        }

        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, input[type=text], textarea {
            margin: 0;
            padding: 0;
            border: 0;
            outline: none 0;
            background: transparent;
        }

        body {
            font-family: "Arial", Georgia, sans-serif;
            font-size: 14px;
            line-height: 150%;
            color: black;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }


        /* /css/fine-comon.css */

        /*.judge-table .calc-footer td {
	font-size: 20px;
}*/

        .calc h4 {
            color: #333;
            background: #EAEAEA;
            padding: 6px 10px;
            margin: 2px 0;
        }

        .calc {
            border: 1px solid #CCC;
            background: #f6f6f6;
            width: 715px;
            margin: 0 auto;
        }

        .edit-table-onsite {
            width: 636px;
            margin: 0 6px;
        }

        .edit-table-onsite td {
            padding: 8px 4px;
        }

        .edit-table-onsite tr {
            border-bottom: 1px dotted #ccc;
        }

        .edit-table-onsite input.custom-combobox-input {
            width: 250px;
        }

        .no-pading td {
            padding: 0 4px 0 0;
        }

        .no-pading tr {
            border-bottom: none;
        }

        .judge-table td {
            white-space: nowrap;
            font-size: 12px;
            /*text-align: center;*/
        }

        .cbr-table .head td {
            vertical-align: middle;
            text-align: center;
        }

        .jt-2 .calc-footer td {
            /*font-size: 20px;*/
            /*font-size: 16px;*/
        }

        .jt-2 td {
            padding: 4px 6px;
            vertical-align: middle;
        }

        .jt-2 td, .jt-4 td {
            text-align: right;
        }

        /*.calc h4 {
            color: #444;
            background: #EAEAEA;
            padding: 6px 10px;
            margin: 2px 0;
        }*/

        .calc h4 span, .calc form {
            display: block;
            width: 715px;
            margin: 0 auto
        }

        #calc-tabs {
            width: 100%;
        }

        #calc-tabs td {
            padding: 4px;
        }

        #calc-tabs a {
            display: block;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background: #7EA77E;
            text-align: center;
            text-decoration: none;
            position: relative;
        }

        #calc-tabs a.calc-tabs1 {
            background: #7EA77E;
        }

        #calc-tabs a.calc-tabs1:hover, #calc-tabs a.calc-tabs1.calc-tab-selected {
            background: #2F862F;
        }

        #calc-tabs a.calc-tabs2 {
            background: #A79B7E;
        }

        #calc-tabs a.calc-tabs2:hover, #calc-tabs a.calc-tabs2.calc-tab-selected {
            background: #9E8036;
        }

        .calc-panos {
            margin-top: 20px;
        }

        .calc-panes-contents {

        }

        #calc-tabs a .ct-pin {
            position: absolute;
            left: 50%;
            bottom: -12px;
            margin-left: -12px;
            border-top: 12px solid #000;
            border-left: 12px solid rgba(0, 0, 0, 0);
            border-right: 12px solid rgba(0, 0, 0, 0);
            display: none;
        }

        #calc-tabs a.calc-tab-selected span {
            display: block;
        }

        #calc-tabs a.calc-tabs1.calc-tab-selected span {
            border-top: 12px solid #2F862F;

        }

        #calc-tabs a.calc-tabs2.calc-tab-selected span {
            border-top: 12px solid #9E8036;
        }

        #pays div {
            vertical-align: middle;
        }

        #pays input {
            vertical-align: middle;
        }

        .edit-table-onsite .payDate {
            width: 90px;
            margin-right: 2px;
        }

        .edit-table-onsite .paySum {
            width: 96px;
            margin: 0 2px;
        }

        .edit-table-onsite .payOrder {
            width: 40px;
            margin: 0 2px;
        }

        .edit-table-onsite .payAdd, .edit-table-onsite .payRemove {
            width: 30px;
        }

        .jt-2 .head td {
            text-align: center !important;
            vertical-align: bottom;
            white-space: normal;
        }

        .jt-payed {
            background: #FFECB2;
        }

        .jt-loaned {
            background: #DFFFEF;
        }

        .judge-table .label, .judge-table .du-label {
            width: 1px;
            white-space: nowrap;
        }

        .jt-3 .label, .jt-3 .du-label {
            background: #EEE;
        }

        #resultWrap {
            width: 715px;
            margin: 0 auto;
        }

        .djuJurist {
            float: right;
            width: 270px;
            font-size: 14px;
            border-left: #CACACA 18px solid;
            padding: 8px 42px 10px 20px;
            background: #F0F0F0;
        }

        .djuJurist a {
            text-decoration: none;
        }

        .djuJurist a:hover {
            text-decoration: underline;
        }

        #dateStart, #dateFinish {
            width: 200px;
        }

        #calc-notes {
            margin: 10px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
        }

        .paysImport {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2;
        }

        .paysMiddle {
            width: 715px;
            margin: 10px auto 0;
            padding: 10px;
            background: #fafafa;
            border: 1px solid #ccc;
        }

        .paysText {
            width: 270px;
            height: 300px;
        }

        .paysTable td {
            padding: 6px 10px;
            font-size: 14px;
        }

        .paysTitle {
            font-size: 18px;
            color: #000099;
        }

        /*.table-scroll {
            width:100%; overflow-x: auto
        }*/

        #resInfo {
            color: #999;
        }

        #center_column h1 span {
            width: 715px;
            margin: 0 auto;
            display: block;
        }

        .formula {
            float: right;
        }

        .formula td {
            vertical-align: middle;
            border: none;
            padding: 2px;
            line-height: 100%;
        }

        .formula .f-big {
            font-size: 16px;
        }

        .formula .f-up {
            border-bottom: 1px solid #000;
        }

        .formula td i {
            font-style: normal;
            font-size: 22px;
        }

        /*******************************/

        #du-help {
            position: absolute;
            left: 50%;
            top: 100px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #000;
            width: 700px;
            margin-left: -350px;
            font-size: 14px;
            line-height: 150%;
            background: #fff
        }

        #du-help .close {
            position: absolute;
            top: 17px;
            right: 10px;
            color: #fff;
            padding: 4px 8px;
            background: #3d4b84;
            border-radius: 2px;
            line-height: 100%
        }

        #du-help ol b {
            display: inline-block;
            width: 150px;
            text-align: center;

            color: #fff;
            font-weight: normal;
        }

        #duh-wrap {
            position: fixed;
            background: rgba(0, 0, 0, 0.6);
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* /css/fine-bookkeeping.css */

        /* Бухгалтерский */

        .jt-4 {
            border: 2px solid #666;
        }

        .jt-4 .head {
            background: none;
            font-weight: bold;

        }

        .jt-4 .head td {
            text-align: center;
            vertical-align: middle;
            white-space: normal;
        }

        .jt-4 td {
            padding: 2px 4px;
        }

        .jt-4 tr:hover {
            background: none;
        }

        .jtb-first td {
            border-top: #666 solid 2px;
        }

        .jt-4 .jt-payed {
            background: #fff6d7;
            font-size: 12px;
            font-style: italic;
            padding-left: 14px;
        }

        .jtb-first td:nth-child(1), .jtb-first td:nth-child(2) {
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
        }


    </style>

    <?php $this->head() ?>
</head>
<body>
<?php echo $content ?>
</body>
</html>
<?php $this->endPage() ?>

