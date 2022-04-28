<?php

class HtmlHelper
{
//    giả sử chúng ta có class html Helper
    static function formOpen($method = 'get', $action = '')
    {
        echo '<form method="'.$method.'" action="'.$action.'" >';
    }

    static function formClose()
    {
        echo '</form>';
    }
    static function input($wrapBefore='',$wrapAfter='',$type='text',$name,$class,$id='',$placehoder,$value=''){
        echo $wrapBefore;
        echo '<input type="'.$type.'" name="'.$name.'" class="'.$class.'" id="'.$id.'" placehoder="'.$placehoder.'" value="'.$value.'" />';
        echo $wrapAfter;
    }
    static function submit($label,$class){
      echo '<button type="submit" class="'.$class.'" >'.$label.' </button>';
    }
}