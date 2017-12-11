function cleanPost($val) {
  if(!isset($_POST[$val])) {
    $_POST[$val] = NULL;
    return;
  }
  $_POST[$val] = trim(htmlentities($_POST[$val], ENT_QUOTES, 'UTF-8'));
}

function validateUser($u, $p) {
  return $u == 'demo' && $p = 'demo';
}
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  cleanPost('user');
  cleanPost('pass');

  if(validateUser($_POST['user'], $_POST['pass'])) {
    $userPrefs = array(
      'name' => 'John Doe',
      'background' => 'FFE78D'
    );
    echo json_encode($userPrefs);
  }
  else {
    header('HTTP/1.1 403 Forbidden');
    echo 'Invalid login information provided';
  }
}
else {
  header('HTTP/1.1 404 Not Found');
  echo '404 page not found!'; // well you will have to make it prettier!
}