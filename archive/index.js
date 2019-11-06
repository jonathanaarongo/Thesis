const express = require('express');
const mysql = require('mysql');

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root ',
    password: 'secret'
});


db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('MySQL Connected...');
});

const app = express();

app.get('/createdb', (req, res) => {
    let sql = 'CREATE DATABASE my_db';
    db.query(sql, (err, result) => {
        if (err) throw err;
        console.log(result);
        res.send('Database created...')
    });
});

app.listen('3000', () => {
    console.log('Server started at port 3000')
});