<?php
/**
 * Database Configuration and Connection
 */

class Database {
    private static ?PDO $connection = null;
    
    public static function connect(): PDO {
        if (self::$connection === null) {
            try {
                $dsn = sprintf(
                    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                    $_ENV['DB_HOST'] ?? 'localhost',
                    $_ENV['DB_PORT'] ?? 3306,
                    $_ENV['DB_NAME'],
                    $_ENV['DB_CHARSET'] ?? 'utf8mb4'
                );
                
                self::$connection = new PDO(
                    $dsn,
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASSWORD'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                throw new Exception('Database connection failed: ' . $e->getMessage());
            }
        }
        
        return self::$connection;
    }
    
    public static function query(string $sql, array $params = []): PDOStatement {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public static function insert(string $table, array $data): int {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        self::query($sql, array_values($data));
        return (int)self::connect()->lastInsertId();
    }
    
    public static function update(string $table, array $data, string $where): int {
        $set = implode(', ', array_map(fn($k) => "$k = ?", array_keys($data)));
        $sql = "UPDATE $table SET $set WHERE $where";
        
        $stmt = self::query($sql, array_values($data));
        return $stmt->rowCount();
    }
    
    public static function delete(string $table, string $where): int {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = self::query($sql);
        return $stmt->rowCount();
    }
    
    public static function select(string $table, array $columns = ['*'], string $where = '', array $params = []): array {
        $columnStr = implode(',', $columns);
        $sql = "SELECT $columnStr FROM $table";
        
        if ($where) {
            $sql .= " WHERE $where";
        }
        
        $stmt = self::query($sql, $params);
        return $stmt->fetchAll();
    }
}

// Create global database connection
try {
    $db = Database::connect();
} catch (Exception $e) {
    die('Failed to connect to database: ' . $e->getMessage());
}
