# Insly tasks

#### TASK 1 - Name
```console
01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101
01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110
01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000
00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000
01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000
01110011
```

Task 1 answer I done with creativity :) You can find answer in file 'task_1.c', 
there you can see C code and if you know this programming language then wellcome
if not it's not a problem too, just follow a few next commands in Unix
Operation system's console and then you compile C-code and start program
 and this program print in console text of first Task and my answer:
 
* gcc task_1.c -o task1
* sudo chmod +x task1
* ./task1
    
#### TASK 2 - Calculator
```console
Write a simple car insurance calculator which will output price of the policy using vanilla PHP
and JavaScript:
1. Create HTML form with fields:
• Estimated value of the car (100 - 100 000 EUR)
• Tax percentage (0 - 100%)
• Number of instalments (count of payments in which client wants to pay for the
policy (1 – 12))
• Calculate button

2. Build calculator logic in PHP using OOP:
• Base price of policy is 11% from entered car value, except every Friday 15-20
o’clock (user time) when it is 13%
• Commission is added to base price (17%)
• Tax is added to base price (user entered)
• Calculate different payments separately (if number of payments are larger than 1)
• Installment sums must match total policy sum- pay attention to cases where sum
does not divide equally
• Output is rounded to two decimal places

3. Final output (price matrix):
• Base price
• Price with commission and tax (every instalment separately)
• Tax amount (separately with every instalment)
• Grand totals (sum of all instalments): Price with commission and tax, total tax
sum.
```

You can find my answer in directory `./task2`. I use vanilla PHP 7 and JavaScript (ES5.1),
but you didn't say something about Styles and that's why I'm using Facebook bootstrap 4
css-file in `index.html`.

If you want check this task in browser then start php server: 
`cd ./test2 | php -S localhost:9001`. You can open http://localhost:9001 in browser now.

I'm not using composer, node.js, npm, gulp or webpack in this task but It isn't means that 
I don't know how to do it and I use this tools in projects usualy. For example, this link to my npm packege with 
React-component:
* https://www.npmjs.com/package/faicon

#### TASK 3 - Store employee data
```console
1. Create a database structure to store employee information. The information stored is
as follows:
• Name
• Birthdate
• ID code / SSN
• Is a current employee (yes/no)
• Contact information (e-mail, phone, address)
The following information in English, Spanish and French:
• Introduction
• Previous work experience
• Education information
Log info:
• Who and when created the entry
• Who and when last modified the data

2. The information should be presented as an .sql file which can be imported into a
MySQL database without errors.

3. Write example query to get 1-person data in all languages

4. Add test data for one customer into database
```
Data in file task_3.sql, example query:
```sql
SELECT * FROM insly_employees WHERE id = 1;

SELECT t.title as type, l.title as language, i.text 
FROM insly_employee_info i 
LEFT JOIN insly_languages l ON l.id = i.language_id 
LEFT JOIN insly_info_type t ON t.id = i.info_type_id
WHERE i.employee_id = 1;
```
