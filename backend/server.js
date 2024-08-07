//Server Module
import express, { urlencoded } from 'express';
import connectDB from './config/database.js';
import { configDotenv } from 'dotenv';
import morgan from 'morgan';
import router from './routes/index.js';
import cors from 'cors';
import cookieParser from 'cookie-parser';

// Load environment variables
configDotenv();
// create an express app
const app = express();
const port = process.env.PORT;

// Logger
app.use(morgan('dev'));
// Connect to the database
connectDB();

app.use(urlencoded({ extended: false }));

// Cors
app.use(cors());
// Cookie parser
app.use(cookieParser());
// Middleware
app.use(express.json());
app.use
// Routes
app.use('',router)
// Start the server
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});