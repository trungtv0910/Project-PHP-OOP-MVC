<?php

class Session
{
    /*
     * data(key, value)=> set session
     * data(key) => get session
     */
    static public function data($key='', $value = '')
    {
        $sessionKey= self::isInvalid(); // kiểm tra và hiển thị thông báo khi thiếu file session ở config/session

        if(!empty($value)){
          if(!empty($key)){
              $_SESSION[$sessionKey][$key]=$value; // set session
              return true;
          }
          return false;
        }else{
            if(empty($key)){
                if(isset($_SESSION[$sessionKey])){
                    return $_SESSION[$sessionKey]; // trả về all các sesssion nếu không truyền vào key
                }
            }else{
                if(isset($_SESSION[$sessionKey][$key])){ //trường hợp không truyền vào value thì kiểm tra xem có tồn tại session với value là key không?
                    return $_SESSION[$sessionKey][$key]; //get session
                }
            }

        }

    }

    /*
     * delete($key) => xoá session với key
     * delete()=> xoá hết session
     */
    static public function delete($key=''){
        $sessionKey= self::isInvalid(); // kiểm tra và hiển thị thông báo khi thiếu file session ở config/session
        if(!empty($key)){
            if(isset($_SESSION[$sessionKey][$key])){
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        }else{
            // trường hợp xoá hêt session
            unset($_SESSION[$sessionKey]);
            return true;
        }
        return false;
    }
    static public function deleteParam($key='',$childKey){
        $sessionKey= self::isInvalid(); // kiểm tra và hiển thị thông báo khi thiếu file session ở config/session
        if(!empty($key)){
            if(isset($_SESSION[$sessionKey][$key][$childKey])){
                unset($_SESSION[$sessionKey][$key][$childKey]);
                return true;
            }
            return false;
        }else{
            // trường hợp xoá hêt session
            unset($_SESSION[$sessionKey]);
            return true;
        }
        return false;
    }
/*
 * Flash Data
 * set flash dâta => giống như set session
 * get flash data   => giông như get sesion ,tuy nhiên nó xoá luôn session đó sau khi get
 */
    /*
     * Mục đích của flash là để thêm những câu thông báo chỉ tồn tại rồi bị xoá đi
     */
    static public function flash($key='', $value= ''){
        $dataFlash = self::data($key,$value);
        if(empty($value)){
            self::delete($key);
        }
        return $dataFlash;
    }
    static public function showErrors($message)
    {
        $data = ['message' => $message];
        App::$app->loadError('exception', $data);
        die();
    }

    static function isInvalid()
    {   global $config;

        if (!empty($config['session'])) {
            $sessionConfig = $config['session'];
            if (!empty($sessionConfig['session_key'])) {
                $sessionKey = $sessionConfig['session_key'];
                return $sessionKey;
            } else {
                self::showErrors('Thiếu cấu hình session_key vui lòng kiểm tra file: config/session.php');
            }

        } else {
            self::showErrors('Thiếu cấu hình session vui lòng kiểm tra file: config/session.php');
        }
    }
}