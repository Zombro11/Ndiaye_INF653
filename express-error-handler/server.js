const express = require('express');
const logger = require('./middleware/logger');
const errorHandler = require('./middleware/errorHandler');

const app = express();
const PORT = 3000;

app.use(express.json());
app.use(logger);

app.get('/', (req, res) => {
    res.send('Hello, World! Welcome to your first Express server.');
});

app.get('/error', (req, res, next) => {
    next(new Error('This is a test error'));
});

app.use(errorHandler);

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
