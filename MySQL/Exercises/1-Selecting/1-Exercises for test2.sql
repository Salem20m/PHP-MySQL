-- 1. Select employees first name, last name, job_id and salary whose first name starts with alphabet S
SELECT first_name, last_name, job_id, salary FROM employees
    WHERE first_name LIKE 'S%';

-- 2. Write a query to select employee with the highest salary
SELECT * FROM employees ORDER BY salary DESC
    LIMIT 1;

SELECT * FROM employees
WHERE salary = (SELECT MAX(salary) FROM employees);

-- 3. Select employee with the second highest salary
SELECT * FROM employees
WHERE salary = (SELECT DISTINCT salary FROM employees ORDER BY salary DESC LIMIT 1,1);

-- 4. Write a query to select employees and their corresponding managers and their salaries
SELECT e.first_name AS 'Employee', e.salary, m.first_name AS 'Manager',  m.salary
FROM employees e
    JOIN employees m
    ON m.employee_id = e.manager_id;


-- 5. Find the count of employees in each department
SELECT departments.department_name, COUNT(employees.employee_id) AS 'Employee Count'
FROM employees
    JOIN departments
    ON employees.department_id = departments.department_id GROUP BY employees.department_id;


-- 6. Find the salary averge of employees
SELECT AVG(salary) AS 'Average' FROM employees
    ORDER BY salary ASC;

-- 7. Select the employees whose first_name contains “an”
SELECT * FROM employees
    WHERE first_name LIKE '%an%';

-- 8. Write a SQL query to display the 5 least earning employees
SELECT * FROM employees ORDER BY salary ASC
    LIMIT 5;

-- 9. Find the employees hired in the 80s
SELECT * FROM employees
    WHERE hire_date LIKE '198%';

-- 10. Find the employees who joined the company after 15th of the month
SELECT * FROM employees
    WHERE DAY(hire_date) > 15;


