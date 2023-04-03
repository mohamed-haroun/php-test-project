<?php

declare(strict_types=1);
namespace models;
use boot\App;
use PDO;
use PDOException;
class User
{
    public function __construct(
    )
    {
    }

    public function createNewUser(
        int|null   $user_id,
        string     $first_name,
        string     $last_name,
        string     $gender,
        string     $birth_date,
        string     $email,
        string     $passwd,
        string     $user_type,
        string     $user_status
    ):int|string {

        ob_start();

        try {
        $connection = App::connect();

        $query = "INSERT INTO users
                  VALUES(:user_id, :firstname, :lastname, 
                         :gender, :birthdate, :email, 
                         :password, :usertype, 
                         :user_status)";

        $stmt = $connection->prepare($query);

        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':firstname', $first_name);
        $stmt->bindValue(':lastname', $last_name);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':birthdate', $birth_date);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', sha1($passwd));
        $stmt->bindValue(':usertype', $user_type);
        $stmt->bindValue(':user_status', $user_status);

        ob_end_clean();

        $stmt->execute();

        $message = $connection->lastInsertId();;

        }catch (PDOException) {
            $message = "This email is already exist!!!";
        } finally {
            return $message;
        }
    }

    public function getUser(string $email, string $password):array|string
    {

        try {
            $connection = App::connect();

            $query = "SELECT * FROM users 
                  WHERE email = :email AND passwd = :password";

            $stmt = $connection->prepare($query);

            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', sha1($password));

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

}