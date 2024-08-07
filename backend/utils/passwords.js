// Desc: Util functions to hash and compare passwords
import bcrypt from "bcryptjs";

// util funtion to compare hashed password
export function comparePasswords(password, hashedPassword) {
    return bcrypt.compare(password, hashedPassword);
}

// util function to hash password
export async function hashPassword(password) {
    return await bcrypt.hash(password, 10);
}

