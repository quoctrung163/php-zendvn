<?php 
class URL{
    public static function createLink($module, $controller, $action, $arrParams = null){
        if (!empty($arrParams)) {
            $paramOpts = '';
            foreach ($arrParams as $key => $value) {
                $paramOpts .= "&$key=$value";
            }            
        }
        // index.php?module=admin&controller=group&action=ajaxStatus&id=1&status=0
        @$url = 'index.php?module='. $module .'&controller='. $controller .'&action='. $action . $paramOpts .'';
        return $url;
    }

    public static function redirect($module, $controller, $action, $params = null){
        $link = self::createLink($module, $controller, $action, $params);
        header('location:' . $link);
        exit();
    }

    public static function checkRefeshPage($value, $module, $controller, $action, $params = null){
        if (Session::get('token') == $value) {
            Session::delete('token');
            URL::redirect($module, $controller, $action);
        } else {
            Session::set('token', $value);
        }
    }
}
?>