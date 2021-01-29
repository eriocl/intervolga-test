<?php

namespace Intervolga\Task5;

class Country
{
    /**
     * Установленное соединение с базой данных
     *
     * @var \PDO
     */
    private $pdo;

    /**
     * Конструктор класса
     *
     * @param \PDO $pdo
     * @return void
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Получение всех стран с базы данных
     *
     * @return array
     */
    public function getAllCountries()
    {
        $sql = 'SELECT * FROM countries';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $errors = $stmt->errorInfo();
        if ($errors[1] === null) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Ошибка получения данных CODE: {$errors[1]} {$errors[2]}");
        }
    }

    /**
     * Добавление страны в базу данных
     *
     * @param array $country
     * @return bool
     */
    public function addCountry(array $country)
    {
        $name = strtolower($country['name']);
        $capital = strtolower($country['capital']);
        $area = $country['area'];
        $sql = 'INSERT INTO countries (name,capital,area) VALUES (:name,:capital,:area)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'capital' => $capital, 'area' => $area]);
        $errors = $stmt->errorInfo();
        if ($errors[1] === null) {
            return true;
        } else {
            throw new \Exception("Ошибка добавления в базу данных. CODE: {$errors[1]} {$errors[2]}");
        }
    }

    /**
     * Проверяет полученные данные и возвращает массив ошибок
     *
     * @param array $country
     * @return array
     */
    public function validate(array $country): array
    {
        $errors = [];
        $name = strtolower($country['name']);
        $capital = strtolower($country['capital']);
        $area = (int)$country['area'];
        $sql = 'SELECT * FROM countries WHERE name = :name';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        if ($stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $errors['name'][] = 'This country already added';
        }
        if (!preg_match('/^[[:alpha:]]{3,}$/u', $name)) {
            $errors['name'][] = 'Wrong format';
        }
        $sql = 'SELECT * FROM countries WHERE capital = :capital';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['capital' => $capital]);
        if ($stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $errors['capital'][] = 'This capital already added';
        }
        if (!preg_match('/^[[:alpha:]]{3,}$/u', $capital)) {
            $errors['capital'][] = 'Wrong format';
        }
        if (($area <= 0) || (empty($area))) {
            $errors['area'][] = 'Wrong format';
        }
        return $errors;
    }
}
