// Desc: JWT token generator and verifier
import jwt from 'jsonwebtoken';

export const generateToken = (user) => {
    const token = jwt.sign({ id: user.id, name:user.name }, process.env.JWT_SECRET, {
        expiresIn: '30d',
    });
    return token;
}

export const verifyToken = (token) => {
    return jwt.verify(token, process.env.JWT_SECRET);
}

export default {
    generateToken,
    verifyToken
}