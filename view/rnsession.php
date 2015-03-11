 <?php 
  if(isset($_COOKIE['uinf'])){
      $cookie = $_COOKIE['uinf'];
      $cookie = stripslashes($cookie);
      $user = json_decode($cookie, true);   
      $_SESSION['userid'] = $user["userid"];
      $_SESSION['username'] = $user["username"];
      $_SESSION['password'] = $user["Password"];
      $_SESSION['usertype'] = $user["usertype"];
      $json = json_encode($user);
      setcookie("uinf", $json, time()+(60*60*6),$_SERVER['DOCUMENT_ROOT']."/master/view/");
}
?>