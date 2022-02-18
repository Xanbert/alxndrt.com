<!doctype html>
<?php include 'mysql.php';?>
<html lang="zh-cmn-Hans">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
        <meta name="renderer" content="webkit"/>
        <meta name="force-rendering" content="webkit"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <!-- MDUI CSS -->
        <link rel="stylesheet" href="https://cdn.w3cbus.com/library/mdui/1.0.2/css/mdui.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <title>Alxndrt Blog</title>
        <link rel="shortcut icon" href="assest/icon.png"> 
        <script src="https://cdn.w3cbus.com/library/mdui/1.0.2/js/mdui.min.js"></script>
        <script src="https://kit.fontawesome.com/a2e6623437.js" crossorigin="anonymous"></script>
    </head>
    <body class="mdui-appbar-with-toolbar mdui-theme-accent-blue">
        <header class="mdui-appbar mdui-appbar-fixed" style="z-index:5000;">
            <div class="mdui-toolbar mdui-toolbar-light" >
                <button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}">
                    <i class="mdui-icon material-icons">menu</i>
                </button>
                <span id="bar-title">Alxndrt's Blog</span>
                <div class="mdui-toolbar-spacer"></div>
                <button class="mdui-btn mdui-btn-icon mdui-ripple"  onclick="changeTheme()">
                    <i class="mdui-icon material-icons night">brightness_7</i>
                    <i class="mdui-icon material-icons day">brightness_4</i>
                </button>
                <button class="mdui-btn mdui-btn-icon mdui-ripple">
                    <i class="mdui-icon material-icons">account_circle</i>
                </button>
            </div>
            <div id="drawer" class="mdui-drawer mdui-drawer-close">
                <ul class="mdui-list">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                        <div class="mdui-list-item-content">主页</div>
                    </li>
                    <div class="mdui-divider"></div>
                    <li class="mdui-list-item mdui-ripple mdui-list-item-active">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-theme-accent">edit</i>
                        <div class="mdui-list-item-content mdui-text-color-theme-accent">Blog</div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon fa-brands fa-git-alt"></i>
                        <div class="mdui-list-item-content">Git</div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">cloud</i>
                        <div class="mdui-list-item-content">Drive</div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">link</i>
                        <div class="mdui-list-item-content">Friends</div>
                    </li>
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">account_circle</i>
                        <div class="mdui-list-item-content">关于</div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="mdui-container">
            <?php
                $conn=sqlConnect();
                selectDatabase($conn, 'BLOG');
                $result = getBlogList($conn);
                if ($result->num_rows > 0) {
                    // 输出数据
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='mdui-col-md-6 mdui-col-xs-12 card-container'>
                            <div class='mdui-card mdui-hoverable'>
                                <div class='mdui-card-media'>
                                    <img class='card-img' src='assest/pic1.jpg'>
                                </div>
                                <div class='mdui-card-primary'>
                                    <div class='mdui-card-primary-title'>{$row["title"]}</div>
                                    <div class='mdui-card-primary-subtitle'>{$row["head"]}</div>
                                </div>
                            </div>
                        </div>
                    ";
                    }
                }
            ?>
        </div>
    </body>
    <script src="../js/color.js"></script>
    <script src="../js/bar.js"></script>
</html>