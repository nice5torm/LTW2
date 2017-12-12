<?php
include_once('../config/init.php');

function createUser($username, $password, $age, $gender, $country, $email) {
    global $conn;
    $stmt = $conn->prepare
    (
        'SELECT * FROM user WHERE username = ?'
    );
    $stmt->execute(array($username));

    if ($stmt->fetch())
    {
        return 'That username is already taken.';
    }
    else
    {
        if (userExists($email))
        {
            return 'That email is already in use';
        }
        else
        {
            $options = ['cost' => 12,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
            $hash_pass = password_hash($password, PASSWORD_BCRYPT, $options);

            $stmt = $conn->prepare
            (
                'INSERT INTO user 
                (username, password, age, gender, country, email) 
                  VALUES (?, ?, ?, ?, ?, ?)'
            );

            $stmt->execute(array($username, $hash_pass, $age, $gender, $country, $email));
        }

    }
}

    function logInUser($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare
        (
            'SELECT * FROM user WHERE username = ?'
        );
        $stmt->execute(array($username));

        $userInfo = $stmt->fetch();

        $passwordV = password_verify($password, $userInfo['password']);

        return $passwordV;
    }

 function editUser($username,$new_password,$new_email,$new_country)
 {
    global $conn;


     $options = ['cost' => 12,
         'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
     $hash_pass = password_hash($new_password, PASSWORD_BCRYPT, $options);

    $stmt=$conn->prepare("UPDATE user SET password=?, email=?,country=? WHERE username=?");
    $stmt->execute(array( $hash_pass, $new_email,$new_country, $username));
    
 }



function userExists($email){

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute(array($email));
    return $stmt->fetch();

}

