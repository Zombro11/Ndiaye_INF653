# Student Records Backend

This is a simple backend API built with Express.js, MongoDB Atlas, Mongoose, and dotenv.

## Install

```bash
npm install
```

## Setup

1. Copy `.env.example` to `.env`
2. Put your real MongoDB Atlas connection string into `.env`
3. Run the server:

```bash
npm run dev
```

## Routes

- GET `/students`
- GET `/students/:id`
- POST `/students`
- PUT `/students/:id`
- DELETE `/students/:id`
