-- database example example
CREATE DATABASE IF NOT EXISTS todo_list;

USE todo_list;

CREATE TABLE IF NOT EXISTS tasks (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status TINYINT(1) DEFAULT 0,
    due_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- Insert initial data
INSERT INTO tasks (title, description, status, due_date) VALUES
('Sample Task 1', 'This is a sample task description 1.', 0, '2024-06-01 00:00:00'),
('Sample Task 2', 'This is a sample task description 2.', 1, '2024-06-02 00:00:00');
