const fs = require('fs');
const path = require('path');

const errorHandler = (err, req, res, next) => {
    const logDir = path.join(__dirname, '..', 'logs');
    const logFile = path.join(logDir, 'errorLog.txt');

    const logMessage =
        `Date/Time: ${new Date().toLocaleString()}\n` +
        `Error Name: ${err.name}\n` +
        `Error Message: ${err.message}\n` +
        `Route: ${req.method} ${req.originalUrl}\n` +
        `-----------------------------------\n`;

    fs.mkdir(logDir, { recursive: true }, (errFolder) => {
        if (!errFolder) {
            fs.appendFile(logFile, logMessage, () => {});
        }
    });

    res.status(500).send('Something went wrong on the server.');
};

module.exports = errorHandler;
