USE todolist;

-- Додавання користувачів
INSERT INTO users (registration_date, email, name, password)
VALUES ('2023-05-23', 'user1@example.com', 'Користувач 1', 'password1'),
       ('2023-05-23', 'user2@example.com', 'Користувач 2', 'password2');
       
       
-- Додавання категорій
INSERT INTO categories (name) VALUES ('Вхідні'), ('Навчання'), ('Робота'), ('Домашні справи'), ('Авто');



-- Додавання завдань
INSERT INTO tasks (created_at, status, title, description, deadline, author_id, category_id)
VALUES
    ('2023-05-23', 'to-do', 'замовити піцу', 'Опис завдання: замовити піцу', '2023-06-04', 1, NULL),
    ('2023-05-23', 'to-do', 'вивчити цейво', 'Опис завдання: вивчити цейво', '2023-06-04', 1, NULL),
    ('2023-05-23', 'to-do', 'погуляти', 'Опис завдання: погуляти', '2023-06-02', 1, NULL),
    ('2023-05-23', 'to-do', 'погуляти', 'Опис завдання: погуляти', '2023-06-02', 2, NULL),
    ('2021-02-01', 'done', 'написати сайт', 'Опис завдання: написати сайт', NULL, 1, NULL),
    ('2015-02-01', 'backlog', 'пройти співбесіду', 'Опис завдання: пройти співбесіду', NULL, 1, NULL),
    ('2015-02-01', 'backlog', 'пройти співбесіду', 'Опис завдання: пройти співбесіду', NULL, 2, NULL),
    ('2011-02-01', 'backlog', 'знайти вхід', 'Опис завдання: знайти вхід', NULL, 2, NULL);

-- Отримати список категорій для одного користувача
SELECT c.name
FROM categories c
         JOIN tasks t ON t.category_id = c.id
WHERE c.id = 1
GROUP BY c.name;

-- Отримати список завдань для одного проекту
SELECT title, description, deadline
FROM tasks
WHERE id = 1;

-- Змінити статус завдання на "в роботі"
UPDATE tasks
SET status = 'in-progress'
WHERE id = 1;

-- Змінити статус завдання на "виконане"
UPDATE tasks
SET status = 'done'
WHERE id = 1;

-- Оновити назву завдання за його ідентифікатором
UPDATE tasks
SET title = 'Нова назва завдання'
WHERE id = 1;
