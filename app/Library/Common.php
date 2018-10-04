<?php
namespace App\Library;
/**
 * Created by IntelliJ IDEA.
 * User: jjong
 * Date: 2018. 2. 13.
 * Time: PM 1:05
 */
class Common
{

    public function alert($message)
    {
        echo "<script>alert('$message')</script>";
    }

    public function locationHref($url)
    {
        echo "<script> location.href='$url'</script>";
    }
}