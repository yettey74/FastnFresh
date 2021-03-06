<?php
class UserService
{
    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary

    protected $_db;       // stores the database handler
    protected $_user;     // stores the user data

    public function __construct(PDO $db, $email, $password) 
    {
       $this->_db = $db;
       $this->_email = $email;
       $this->_password = $password;
    }

    public function login()
    {
        $user = $this->_checkCredentials();
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION['user_id'] = $user['id'];
            return $user['id'];
        }
        return false;
    }

    protected function _checkCredentials()
    {
        $stmt = $this->_db->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute(array($this->email));
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = sha1($user['salt'] . $this->_password);
            if ($submitted_pass == $user['password']) {
                return $user;
            }
        }
        return false;
    }
	
	public function getUser()
    {
        return $this->_user;
    }
	
	// EXAMPLE USE
	/* $pdo = new PDO('mysql:dbname=mydb', 'myuser', 'mypass');

	$userService = new UserService($pdo, $_POST['email'], $_POST['password']);
	if ($user_id = $userService->login()) {
		echo 'Logged it as user id: '.$user_id;
		$userData = $userService->getUser();
		// do stuff
	} else {
		echo 'Invalid login';
	}
	*/
}
?>