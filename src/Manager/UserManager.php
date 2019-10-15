<?php
namespace DeveloperTest\Manager;

class UserManager
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    public function __construct()
    {
        $this->databaseManager = new DatabaseManager();
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        $sql = <<<SQL
        SELECT *
        FROM users
        ORDER BY id
SQL;

        $statement = $this->databaseManager->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUser($user_id)
    {
        $sql = <<<SQL
        SELECT *
        FROM users
        WHERE id = :user_id
SQL;

        $statement = $this->databaseManager->prepare($sql);
        $statement->execute([
            'user_id' => $user_id
        ]);

        return $statement->fetch();
    }

    /**
     * @param string $first_name
     * @param string $surname
     * @param string $email
     * @param string $username
     * @param string $password
     * @return mixed
     */
    public function createUser($first_name, $surname, $email, $username, $password)
    {
        $sql = <<<SQL
        INSERT INTO users
          (first_name, surname, email, username, password)
        VALUES
          (:first_name, :surname, :email, :username, :password);
SQL;

        $statement = $this->databaseManager->prepare($sql);

        $statement->execute([
            'first_name' => $first_name,
            'surname' => $surname,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);

        return $this->getUser($this->databaseManager->lastInsertId());
    }

    /**
     * @param int $user_id
     * @param string $first_name
     * @param string $surname
     * @param string $email
     * @param string $username
     * @param string $password
     * @return mixed
     */
    public function updateUser($user_id, $first_name, $surname, $email, $username, $password)
    {
        $sql = <<<SQL
        UPDATE users
        SET
          first_name = :first_name,
          surname = :surname,
          email = :email,
          username = :username,
          password = :password
        WHERE id = :user_id
SQL;

        $statement = $this->databaseManager->prepare($sql);
        return $statement->execute([
            'first_name' => $first_name,
            'surname' => $surname,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'user_id' => $user_id
        ]);
    }

    public function deleteUser($user_id)
    {
        $sql = <<<SQL
        DELETE FROM users
        WHERE id = :user_id
SQL;

        $statement = $this->databaseManager->prepare($sql);
        return $statement->execute([
            'user_id' => $user_id
        ]);
    }
}