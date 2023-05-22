CREATE DATABASE todolist;

USE todolist;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       registration_date DATETIME NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       name VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL
);

CREATE TABLE projects (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          author_id INT NOT NULL,
                          FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE tasks (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       created_at DATETIME NOT NULL,
                       status ENUM('backlog', 'to-do', 'in-progress', 'done') DEFAULT 'backlog',
                       title VARCHAR(255) NOT NULL,
                       description TEXT NOT NULL,
                       file VARCHAR(255),
                       deadline DATE,
                       author_id INT NOT NULL,
                       project_id INT,
                       FOREIGN KEY (author_id) REFERENCES users(id),
                       FOREIGN KEY (project_id) REFERENCES projects(id)
);

CREATE UNIQUE INDEX idx_email ON users (email);
CREATE INDEX idx_title ON tasks (title);