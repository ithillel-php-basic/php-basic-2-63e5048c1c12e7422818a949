USE todolist;

-- Додавання користувачів
INSERT INTO users (registration_date, email, name, password)
VALUES ('2023-05-23', 'user1@example.com', 'Користувач 1', 'password1'),
       ('2023-05-23', 'user2@example.com', 'Користувач 2', 'password2');
       
       
-- Додавання категорій
INSERT INTO categories (name, author_id) VALUES ('Вхідні', 1), ('Навчання',2), ('Робота',1), ('Домашні справи',2), ('Авто',1);



-- Додавання завдань
INSERT INTO tasks (created_at, status, title, description, deadline, author_id, category_id)
VALUES
    ('2023-05-23', 'to-do', 'замовити піцу', 'Опис завдання: замовити піцу', '2023-06-04', 1, 1),
    ('2023-05-23', 'to-do', 'вивчити цейво', 'Опис завдання: вивчити цейво', '2023-06-04', 1, 2),
    ('2023-05-23', 'to-do', 'погуляти', 'Опис завдання: погуляти', '2023-06-02', 1, 2),
    ('2023-05-23', 'to-do', 'погуляти', 'Опис завдання: погуляти', '2023-06-02', 2, 3),
    ('2021-02-01', 'done', 'написати сайт', 'Опис завдання: написати сайт', NULL, 1, NULL),
    ('2015-02-01', 'backlog', 'пройти співбесіду', 'Опис завдання: пройти співбесіду', NULL, 1, 2),
    ('2015-02-01', 'backlog', 'пройти співбесіду', 'Опис завдання: пройти співбесіду', NULL, 2, 3),
    ('2011-02-01', 'backlog', 'знайти вхід', 'Опис завдання: знайти вхід', NULL, 2, 3);

-- Отримати список категорій для одного користувача
SELECT * name
FROM categories
WHERE author_id = 1

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
