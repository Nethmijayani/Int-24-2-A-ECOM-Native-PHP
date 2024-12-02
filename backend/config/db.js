//config store configuration settings

//db define connection to the mysql database.

const mysql = require("mysql2");
require("dotenv").config(); //loads environment variables

const pool = mysql.createPool({
  //create mysql connection pool
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0,
});

// Use promise-based API for async/await support
const promisePool = pool.promise();

module.exports = {
  pool: promisePool,
  getConnection: () => promisePool.getConnection(),
  execute: (...args) => promisePool.execute(...args),
};
