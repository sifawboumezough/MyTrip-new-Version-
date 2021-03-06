<?php
    include('./views/includes/alerts.php');
    require_once './autoload.php';
    require_once './Controller/HomeController.php';
    require_once 'Database/DB.php';


    $home = new HomeController();
    // $home->index($_GET['page']);

    $pages = ['home' , 'login' , 'register' , 'avaibleflights' , 'booking' , 'book' , 'reserve' , 'logout' , 'myreservation' , 'cancel', 
    'loginadmin' ,'admin', 'addflight' , 'update' , 'delete' , 'reservations', 'cancelreservation'];
    // if(isset($_GET['page'])) {
    //     if(in_array($_GET['page'],$pages)) {
    //         $page =  $_GET['page'];
    //         $home->index($page);
    //     }
    //     else {
    //         include('views/includes/404.php');
    //     }
    // } else {
    //     $home->index('home');
    // }


    if(isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $pages)) {
                $page = $_GET['page'];
                $home->index($page);
            } else {
                include('views/includes/404.php');
            }
        } else if ($_SESSION['user_type'] == 0) {
            $home->index('booking');
            
        } else if ($_SESSION['user_type'] == 1) {
            $home->index('admin');
        } else {
            $home->index('home');
        }
        // require_once './views/includes/footer.php';
    }else if(isset($_GET['page']) && $_GET['page'] === 'register'){
        $home->index('register');
    }
    else if(isset($_GET['page']) && $_GET['page'] === 'login'){
        $home->index('login');
    }
    
    else if(isset($_GET['page']) && $_GET['page'] === 'booking'){
        $home->index('booking');
    }
    
    else{
        $home->index('login');
        
    }
?>
    