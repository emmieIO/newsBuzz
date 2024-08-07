// Module to connect to the database
import mongoose from 'mongoose';
import { configDotenv } from 'dotenv';

// Load environment variables
configDotenv();

//function to connect to the database
const connectDB = async () => {
  try {
    await mongoose.connect(process.env.MONGO_URI);
    console.log('MongoDB connected');
  } catch (error) {
    console.error(error.message);
    process.exit(1);
  }
};

export default connectDB;