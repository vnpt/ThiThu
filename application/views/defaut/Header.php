<!DOCTYPE html>
<html>
    <head>
        <title><?php if (isset($results['titlePage'])) echo $results['titlePage']; else echo "Thi Thử đại học"; ?></title>
        <link href="<?php echo ROOT_PATH ?>public/css/main.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="wrapper">
            <div id="wrap_header">
                <div id="banner_header">
                    <p><a class="stitle_web">Thi thử đại học</a></p>
                </div>
                <div id="nav_menu">
                    <div class="header-row-1"> 
                        <ul class="header-menu">
                            <li><a href="<?php echo ROOT_PATH ?>">Trang chủ</a></li>
                            <li><a href="<?php echo ROOT_PATH ?>gioi-thieu.html">Giới thiệu</a></li>
                            <li><a href="<?php echo ROOT_PATH ?>tin-tuc/">Tin tức</a></li>
                            <li><a href="<?php echo ROOT_PATH ?>dich-vu/">Dịch vụ</a></li>
                            <li><a href="<?php echo ROOT_PATH ?>sitemap.html">Sitemap</a></li>
                            <li><a href="<?php echo ROOT_PATH ?>lien-he.html">Liên hệ</a></li> 
                        </ul>		   <form id="search_mini_form" action="#" method="get">
                            <div class="form-search">
                                <label for="search">Tìm kiếm:</label>
                                <input autocomplete="off" id="search" name="q" value="" class="input-text" type="text">
                                <button type="submit" title="Tìm kiếm" class="button"><span><span>Tìm kiếm</span></span></button>
                                <div style="display: none;" id="search_autocomplete" class="search-autocomplete"></div>
                                <!--
                                        <script type="text/javascript">
                                        //<![CDATA[
                                            var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search entire store here...');
                                            searchForm.initAutocomplete('http://livedemo00.template-help.com/magento_40847/searchautocomplete/suggest/result/', 'search_autocomplete');
                                        //]]>
                                        </script>
                                -->

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="wrap_main">
                <div id="wrap_left">
                
                </div>
                
                <div id="wrap_right">
                
                </div>
            
            
            
        
