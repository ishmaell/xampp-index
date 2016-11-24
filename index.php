<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
$global_url = '../';
$http_host = $_SERVER['HTTP_HOST'];
$base_url = 'http://'. $http_host .'/projects/';
$dir = new DirectoryIterator($global_url);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Projects</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="<?php echo $base_url; ?>fonts/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/font.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/main.css">
    <script type="text/javascript" src="<?php echo $base_url; ?>js/app.js"></script>
</head>

<body>
    <!-- START MAIN CONTAINER -->
    <div class="main-container">
        <!-- START HEADER -->
        <div class="header">
            <h3>Projects</h3>
        </div>
        <!-- / END HEADER -->
        <!-- START NAV BAR -->
        <div class="nav-bar">
            <ul class="nav-list">
                <li class="nav-title">Projects</li>
                <?php
                    foreach ($dir as $file_info) {
                        if ($file_info->isDir() && !$file_info->isDot()) {
                            $url = $file_info->getFilename();
                            $project = '<li>';
                            $project .= '<a class="clearfix" href="'. $global_url .''. $url .'" data-name="'. $file_info->getFilename() .'">';
                            $project .= '<i class="ion ion-folder"></i>';
                            $project .= '<span>'.$file_info->getFilename().'</span>';
                            $project .= '</a>';
                            $project .= '</li>';
                            echo $project;
                        }
                    }
                ?>
                <li class="footer">
                       
                </li>
            </ul>
        </div>
        <!-- / END NAV BAR -->
        <!-- START CONTENT -->
        <div class="content">
            <!-- START ROW -->
            <div class="row">
            <?php
                foreach ($dir as $file_info) {
                    if ($file_info->isDir() && !$file_info->isDot()) {
                        $url = $file_info->getFilename();
                        $project = '<div class="column-2 project">';
                        $project .= '<a class="clearfix" href="'. $global_url .''. $url .'" data-name="'. $file_info->getFilename() .'">';
                        $project .= '<div class="project-dir">';
                        $project .= '<i class="ion ion-folder"></i>';
                        $project .= '<h4>'.$file_info->getFilename().'</h4>';
                        $project .= '</div>';
                        $project .= '</a>';
                        $project .= '</div>';
                        echo $project;
                    }
                }
            ?>
            </div>
            <!-- / END ROW -->
        </div>
        <!-- / END CONTENT -->
        <!-- START FOOTER -->
        <footer>
            Powered by <a href="http://www.isiakaismaila.com" target="_blank">Isiaka Ismaila</a>
        </footer>
        <!-- / END FOOTER -->
    </div>
    <!-- / END MAIN CONTAINER -->

</body></html>