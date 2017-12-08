<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once "models/library.php";
$library = new Library();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url; ?>fonts/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/font.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/main.css">
</head>

<body>
    <!-- START MAIN CONTAINER -->
    <div class="main-container">
        <!-- START HEADER -->
        <div class="header clearfix">
            <div class="search-area">
                <span class="search-icon">
                    <i class="ion ion-search"></i>
                </span>
                <input type="text" class="" id="search" placeholder="Search">
            </div>
            <h3>Projects</h3>
        </div>
        <!-- / END HEADER -->
        <?php
            $projectArray = [];

            foreach ($dir as $file_info) {
                if ($file_info->isDir() && !$file_info->isDot()) {
                    $url = $file_info->getFilename();
                    array_push($projectArray, $url);
                    sort($projectArray);
                }
            }
            $projectLength = count($projectArray);
        ?>
        <!-- START NAV BAR -->
        <div class="nav-bar">
            <ul class="nav-list">
                <li class="nav-title">Projects</li>
                <?php

                    for($x = 0; $x < $projectLength; $x++) {
                        $project = '<li>';
                        $project .= '<a class="clearfix" href="'. $global_url .''. $projectArray[$x] .'" data-name="'. $projectArray[$x] .'">';
                        $project .= '<i class="ion ion-folder"></i>';
                        $project .= '<span>'.$projectArray[$x].'</span>';
                        $project .= '</a>';
                        $project .= '</li>';
                        echo $project;
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

            <div class="row" id="row">
                
            <?php

                for($x = 0; $x < $projectLength; $x++) {

                    $project = '<div class="project">';
                    $project .= '<a class="clearfix" href="'. $global_url .''. $projectArray[$x] .'" data-name="'. $projectArray[$x] .'">';
                    $project .= '<div class="project-dir">';
                    $project .= '<i class="ion ion-folder"></i>';
                    $project .= '<h4>'.$library->textTrunc($projectArray[$x], 2).'</h4>';
                    $project .= '</div>';
                    $project .= '</a>';
                    $project .= '</div>';
                    echo $project;
                }

            ?>
            </div>
            <!-- / END ROW -->
        </div>
        <!-- / END CONTENT -->
        <!-- START FOOTER -->
        <footer>
            Powered by <a href="https://github.com/ishmaell" target="_blank">Isiaka Ismaila</a>
        </footer>
        <!-- / END FOOTER -->
    </div>
    <!-- / END MAIN CONTAINER -->
    
    <script type="text/javascript" src="<?php echo $base_url; ?>js/app.js"></script>

</body></html>
