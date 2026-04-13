const fs = require('fs');
const path = require('path');

const logger = (req, res, next) => {
    const logDir = path.join(__dirname, '..', 'logs');
    const logFile = path.join(logDir, 'requestLog.txt');

    const logMessage = `${new Date().toLocaleString()} | ${req.method} ${req.url}\n`;

    fs.mkdir(logDir, { recursive: true }, (err) => {
        if (!err) {
            fs.appendFile(logFile, logMessage, () => {});
        }
    });

    next();
};

module.exports = logger;
