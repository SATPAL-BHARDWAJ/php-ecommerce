<?php

if( !function_exists('url') ) {
    function url( $url = null, $parameter = [] ) {
        echo BASE_PATH."{$url}";
    }
}

if( !function_exists('layout') ) {
    function layout( $file ) {
        include_once "./resources/layouts/{$file}.php";
    }
}

if( !function_exists('redirect') ) {
    function redirect( $path ) {
        header('location: '.BASE_PATH.$path);
    
        exit();
    }
}

if( !function_exists('session') ) {
    function session( $key ) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
}

if( !function_exists('setSession') ) {
    function setSession( $key, $value ) {
        $_SESSION[$key] = $value;
    }
}

if( !function_exists('hasSession') ) {
    function hasSession( $key ) {
        $keys = is_array($key) ? $key : array($key);

        $exist = false;
        foreach($keys as $k) {
            if(isset($_SESSION[$k])) {
                $exist = true;
            }
        }

        return $exist;
    }
}


if( !function_exists('removeSession') ) {
    function removeSession( $key ) {
        $keys = is_array($key) ? $key : array($key);
        
        foreach($keys as $k) {
            if(isset($_SESSION[$k])) {
                unset($_SESSION[$key]);
            }
        }
    }
}

if( !function_exists('dd') ) { 
    function dd( ...$data ) {

        if ( is_array($data) ) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        } else {
            var_dump($data);
        }
        
        die;
    }
}

if( !function_exists('formError') ) {
    function formError( $key ) {
        if ( isset($_SESSION['errorsBag']) && isset($_SESSION['errorsBag'][$key]) ) {
            $error = $_SESSION['errorsBag'][$key];
            unset($_SESSION['errorsBag'][$key]);
            return $error;
        }
    }
}

if( !function_exists('HasFormError') ) {
    function HasFormError( $key ) {
        if ( isset($_SESSION['errorsBag']) && isset($_SESSION['errorsBag'][$key]) ) {
            return true;
        }

        return false;
    }
}

if( !function_exists('setErrorsBag') ) {
    function setErrorsBag( $key, $value ) {
        $_SESSION['errorsBag'][$key] = $value;
    }
}

if( !function_exists('hasErrorBag') ) {
    function hasErrorBag() {
        return isset($_SESSION['errorsBag']) && count($_SESSION['errorsBag']) > 0;
    }
}

if( !function_exists('showFormError') ) {
    function showFormError($key) {
        if (HasFormError( $key )) {
            $error = formError( $key );
            echo "<span class='text-white'>*{$error}</span>";
        };
    }
}

if( !function_exists('resetErrorBag') ) {
    function resetErrorBag() {
        if( isset($_SESSION['errorsBag']) ) {
            unset($_SESSION['errorsBag']);
        }
    }
}

if ( !function_exists('setUser') ) {
    function setUser($id) {
        $pdo = new Database();
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $user = $stmt->fetch();
        return $user;
    }
}

if ( !function_exists('countCartProducts') ) {
    function countCartProducts( $user_id ) {
        $pdo = new Database();
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT 'id', COUNT('id') as numrows FROM cart WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$row = $stmt->fetch();

        return $row['numrows'];
    }
}

if ( !function_exists('countCart') ) { 
    function countCart( ) {
        $cart_count = 0;
        if( isset($_SESSION['user']) ) {
            $cart_count = countCartProducts($_SESSION['user']);
        } elseif (isset($_SESSION['cart'])) {
            $cart_count = count($_SESSION['cart']);
        }

        return $cart_count;
    }
}

if ( !function_exists('cartProducts') ) { 
    
    function cartProducts( ) {
        $products = [];

        if ( isset($_SESSION['user']) ) {
            $pdo = new Database();
            $conn = $pdo->open();

            $stmt = $conn->prepare("SELECT products.id, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
			$stmt->execute(['user'=>$_SESSION['user']]);

            $rows = $stmt->fetchAll();
            $products = array_column($rows, 'id');

        } else if ( isset($_SESSION['cart']) ) {
            $products = array_column($_SESSION['cart'], 'productid');
        }

        return $products;
    }

}

